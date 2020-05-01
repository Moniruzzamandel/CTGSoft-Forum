@extends('layouts.app')

@section('content')
    <div class="card">
        @include('partials.discussion-header')

        <div class="card-body">
            <div class="text-center">
                <strong>{{ $discussion->title }}</strong>
            </div>
            <hr />
            {!! $discussion->content !!}

            @if($discussion->bestReply)
                <div class="card bg-success mt-3">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                <img src="{{ Gravatar::src($discussion->bestReply->author->email) }}" alt="" style=" width:45px; height: 45px; border-radius: 40px;"/> <span class="badge badge-info text-wrap ml-2" style="font-size: 14px; color: black;">{{ $discussion->bestReply->author->name }}</span>
                            </div>
                            <div>
                                <a class="btn btn-outline-warning btn-sm" style="color: black;">BEST REPLY</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="color: white">
                        {!! $discussion->bestReply->content !!}
                    </div>
                </div>
            @endif
        </div>
    </div>

    @foreach($discussion->replies()->paginate(7) as $reply)
        <div class="card mt-3">
            <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <img src="{{ Gravatar::src($reply->author->email) }}" alt="" style=" width:45px; height: 45px; border-radius: 40px;"/> <span class="badge badge-primary text-wrap ml-2" style="font-size: 14px;">{{ $reply->author->name }}</span>
                        </div>
                        <div>
        @auth
            @if(auth()->user()->id == $discussion->user_id)
                <form action="{{ route('discussions.best-reply', ['discussion'=> $discussion->slug, 'reply' => $reply->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-info btn-sm" style="color: black;">MARK AS BEST REPLY</button>
                </form>
            @endif
        @endauth
                        </div>
                    </div>
            </div>

            <div class="card-body">
                {!! $reply->content !!}
            </div>
        </div>
    @endforeach

    <div class="mt-3 text-center">
        {{ $discussion->replies()->paginate(7)->links() }}
    </div>

    <div class="card mt-4">
        <div class="card-header">
            Add Reply
        </div>
        <div class="card-body">
            @auth
                <form action="{{ route('replies.store', $discussion->slug) }}" method="POST">
                    @csrf
                    <input id="content" type="hidden" name="content">
                    <trix-editor input="content"></trix-editor>
                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-success btn-sm">ADD REPLY</button>
                    </div>
                </form>
            @else
                <div class="text-center">
                    <a href="{{ route('login') }}" class="btn btn-outline-primary btn-lg" style="color: black;">Please Signin to Add Discussion</a>
                </div>
            @endauth
        </div>
    </div>
@endsection
