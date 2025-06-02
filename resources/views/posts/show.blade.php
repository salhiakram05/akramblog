@extends("layouts.app")
@section("title")
show page
@endsection
@section("content")

<x-alert-errors />


<div class="card mt-5  ">

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

<form method="POST" action="{{ route('comments.store', $post->id) }}" class="mt-4 mb-3">
  @csrf
  <div class="input-group">
    <textarea id="addcomment" name="comment" class="form-control" placeholder="Write a comment..." rows="2" style="resize: none;">{{ old('comment') }}</textarea>
    <button class="btn btn-outline-primary" type="submit">Comment</button>
  </div>
</form>



@foreach ($post->comments as $comment)
  <div class="card mb-3 shadow-sm">
    <div class="card-body">
      <h6 class="card-title mb-1 fw-bold">{{ $comment->commenter }}</h6>
      <p class="card-text mb-2">{{ $comment->comment }}</p>
      <small class="text-muted">{{ $comment->created_at->format('Y-m-d H:i') }}</small>
    </div>
  </div>
@endforeach

@endsection

