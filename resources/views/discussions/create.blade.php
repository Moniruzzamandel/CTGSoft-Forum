@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Add Discussion</div>

        <div class="card-body">
        <form action="{{ route('discussions.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Name</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Enter Discussion Title">
                </div>
                <div class="form-group">
                    <label for="content">Description</label>
                    <input id="content" type="hidden" name="content">
                    <trix-editor input="content"></trix-editor>
                    {{-- <textarea class="form-control" name="description" id="description" rows="5" cols="5"></textarea> --}}
                </div>
                <div class="form-group">
                    <label for="channel_id">Select Channel</label>
                    <select name="channel_id" id="channel_id" class="form-control">
                        <option value="">Select Channel</option>
                            @foreach ($channels as $channel)
                                <option value="{{$channel->id}}">{{$channel->name}}</option>
                            @endforeach
                    </select>
                </div>
                <div class="form-group">
                        <button type="submit" class="btn btn-success btn-sm">ADD DISCUSSION</button>
                </div>
            </form>
        </div>
    </div>
@endsection
