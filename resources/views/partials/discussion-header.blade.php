<div class="card-header">
        <div class="d-flex justify-content-between">
            <div>
                <img src="{{ Gravatar::src($discussion->author->email) }}" alt="" style=" width:45px; height: 45px; border-radius: 40px;"/> <span class="badge badge-primary text-wrap ml-2" style="font-size: 14px;">{{ $discussion->author->name }}</span>
                {{-- <img src="{{ asset('img/avatar.jpg') }}" alt="" style=" width:45px; height: 45px; border-radius: 40px;{{  "/> }} {{ $discussion->users()->name }} --}}
            </div>

            <div>
            <a href="{{ route('discussions.show', $discussion->slug ) }}" class="btn btn-outline-success btn-sm text-right">View Details</a>
            </div>
        </div>
</div>
