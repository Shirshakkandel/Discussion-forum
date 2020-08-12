@extends('layouts.app')

@section('content')
  <div class="d-flex justify-content-end my-4">
  <a href="{{route('discussion.create')}}" class="btn btn-success">Add Discussion</a>
  </div>
<div class="card">
    <div class="card-header">Notification</div>
    <div class="card-body">
        <ul class="list-group">
    @foreach ($notifications as $notification)
   
            <li class="list-group-item">
                @if ($notification->type ==='App\Notifications\NewReplyAdded')
                    A new reply was added to your discussion
                   <strong> {{$notification->data['discussion']['title']}} </strong>

            <a href="{{route('discussion.show',$notification->data['discussion']['slug'])}}" class="btn float-right btn-sm btn-info">
                    View discussion
                </a>
                @endif
            
             
                @if ($notification->type ==='App\Notifications\ReplyMarkedBestReply')
                
               Your reply to the discussion <strong> {{$notification->data['discussion']['title']}} </strong> was marked as best reply

        <a href="{{route('discussion.show',$notification->data['discussion']['slug'])}}" class="btn float-right btn-sm btn-info">
                View discussion
            </a>
            @endif
        
            
            </li>
            @endforeach
        </ul>
    </div>
 
        </div> 
    </div>
</div>
@endsection
