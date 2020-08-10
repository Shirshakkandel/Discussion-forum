@extends('layouts.app')

@section('content')

 @foreach ($discussions as $discussion)
     <div class="card">
        <div class="card-header">
           @include('partials/discussion-header')
        </div>
   


   </div>

     <div class="card-body">
        <div class="text-center">
        <strong> 
        {!! $discussion->title !!}
      </strong>  
      </div>
     </div>
 @endforeach

 {{$discussions->links()}}
  

@endsection
