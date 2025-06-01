@extends("layouts.app")
@section("title")
show page
@endsection
@section("content")

<x-alert-errors />


<div class="card mt-5 p-3 ">

  <div class="card-body">
  <div class="publisher mb-2">
   <img  height="35" width="35" src="https://ui-avatars.com/api/?name={{ urlencode($post->user->name) }}&background=random&color=fff" 
     class="rounded-circle me-2" width="35" height="35" alt="{{ $post->user->name }}">
   <b>{{ $post->user->name }}</b>
  </div>
    <h3 class="card-title  mb-2">{{$post->title}}</h3>
    <x-tags :tags="$post->tags" />

    @if ($post->path)
        <img width="100%" height="auto" src="{{ asset('storage/' . $post->path) }}" class="rounded d-block mt-3 mb-3" >
    @endif
    <p style="font-size:115%;text-align: justify;" class="card-text  mb-3">{{$post->post}}</p>


    <div class="mb-3" style="color:#5a5a5a;font-size:16px">at {{$post->created_at}}  </div>

<x-like :post="$post" />

</div>




</div>

<h5   class="card-title mt-5">Comments</h5>

<form class="mt-3 mb-5" method="POST" action="{{route('comments.store',$post->id)}}" >
@csrf

  <div class="input-group mb-3">
    <textarea name="comment" type="text" class="form-control" placeholder="comment" aria-label="Recipient’s username" aria-describedby="button-addon2">
    {{old('comment')}}
    </textarea>
    <button id="addcomment" type="submit" class="btn btn-outline-secondary" >Comment</button>
  </div>

</form>

@foreach ($post->comments as $comment)
<div class="card mt-3 ">
  <div class="card-body">
    <h6 class="card-subtitle mb-2 text-body-secondary">{{$comment->commenter}}</h6>
    <p class="card-text">{{$comment->comment}}</p>

    <h6 class="card-subtitle mb-2 text-body-secondary">{{$comment->created_at}}</h6>


  </div>

</div>
@endforeach
@endsection

