@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Notifications</div>

        <div class="card-body">
            <ul class="list-group">
                @foreach ($notifications as $notification)
                    <li class="list-group-item">
                        @if( $notification->type === 'App\Notifications\NewReplyAdded')
                            <span style="color: #38C172">A new reply was added to your discussion</span>
                            <br>
                            <strong>
                                {{ $notification->data['discussion']['title'] }}
                            </strong>
                        <a href="{{ route('discussions.show', $notification->data['discussion']['slug']) }}" class="btn btn-primary float-right">
                                <span class="badge badge-light">View Discussion</span>
                            </a>
                        @endif

                        @if( $notification->type === 'App\Notifications\ReplyMarkedAsBestReply')
                            <span style="color: rgb(56, 75, 210)">Your reply was marked as best reply</span>
                            <br>
                            <strong>
                                {{ $notification->data['discussion']['title'] }}
                            </strong>
                        <a href="{{ route('discussions.show', $notification->data['discussion']['slug']) }}" class="btn btn-primary float-right">
                                <span class="badge badge-light">View Discussion</span>
                            </a>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
