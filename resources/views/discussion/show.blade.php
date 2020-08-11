@extends('layouts.app')

@section('content')
  <div class="d-flex justify-content-end my-4">
  <a href="{{route('discussion.create')}}" class="btn btn-success">Add Discussion</a>
  </div>

<div class="card">
    <div class="card-header">
     @include('partials/discussion-header')
    </div>
    <div class="card-body">
        <div class="text-center">
        <strong>{{$discussion->title}}</strong>
        </div>
       <hr>
      {!! $discussion->content !!}

      @if ($discussion->bestReply)
          <div class="card bg-success my-5" style="color:#fff">
            <div class="card-header">
              <div class="d-flex justify-content-between">
                <div>
                <img src="{{Gravatar::src($discussion->bestReply->owner->email)}}" width="40px" height="40px" style="border-radius: 50%" class="mr-2">
                 <strong>
                   {{$discussion->bestReply->owner->name}}
                 </strong>
              </div>

              <div>
                <strong>
                  Best Reply
                </strong>
              </div>
              </div>
            </div>
            <div class="card-body">
             {!!$discussion->bestReply->content!!}
            </div>
          </div>
      @endif
   </div> 
</div>
<hr> 

@foreach($discussion->replies()->paginate(3) as $reply)
<div class="card ">
  <div class="card-header ">
    <div class="d-flex justify-content-between">
      <div>
        <img src="{{Gravatar::src($reply->owner->email) }}" width="40px" height="40px" style="border-radius: 50%">
        <span>{{ $reply->owner->name }}</span>
      </div>
      
      @auth
          
     
      @if (auth()->user()->id === $discussion->user_id)
       <form action="{{route('discussion.best-reply',['discussion'=>$discussion->slug, 'reply'=>$reply->id]) }}" method="POST">
       @csrf
       <button type="submit" class="btn btn-sm btn-info">Mark as best reply  </button>
      </form>
        
      @endif
      @endauth
      
    </div>

  </div>

  <div class="card-body">
    {!! $reply->content !!}

  </div>
</div>

@endforeach
{{$discussion->replies()->paginate(3)->links()}}




 

@auth
<div class="card my-4">
  <div class="card-header">
    Add a reply
  </div>
 
 <div class="card-body">
 <form action="{{route('replies.store' , $discussion->slug)}}" method="POST">
  @csrf
    <input type="hidden" name="content" id="content">
    <trix-editor input="content"></trix-editor>
      
    <button type="submit" class="btn btn-info my-2">Add reply</button>

  </form>
</div>
@else
<a class="btn btn-primary my-2" href="{{route('login')}}"> Login to Add reply</a>
 @endauth

</div>


@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.4/trix.min.css">
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.4/trix.min.js">  </script>
@endsection



@endsection
