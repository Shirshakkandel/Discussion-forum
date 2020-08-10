@extends('layouts.app')

@section('content')
  
<div class="card">
    
    <div class="card-header">
        Add discussion
    </div>
    <div class="card-body">
        <form action="{{route('discussion.store')}}" method="POST">
            @csrf
            <div class="form-group">
               <label for="Title">Title</label>
               <input type="text" class="form-control" name="title">
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <input id="content" type="hidden" name="content">
                <trix-editor input="content"></trix-editor>
            </div>

            <div class="form-group">
               <label for="channel">Channel</label>
               <select name="channel" id="channel" class="form-control">
                     @foreach ($channels as $channel)
               <option value="{{$channel->id}}">{{$channel->name}}</option>
                     @endforeach
      
               </select>
            </div>

            <button class="btn btn-primary" type="submit"> Add discussion</button>
      </form>
    </div>
        </div> 
    </div>
</div>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.4/trix.min.css">
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.4/trix.min.js">  </script>
@endsection
