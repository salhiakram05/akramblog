@extends ("layouts.app")
@section("title")
edit post
@endsection
@section("content")

<x-alert-errors />

<form method="POST" enctype="multipart/form-data" action="{{route('posts.update' , $post->id)}}" >
@csrf
@method('PUT')
<div class="mt-5 mb-3">
  <label for="exampleFormControlInput1" class="form-label">title</label>
  <input name="title" type="text" class="form-control" id="exampleFormControlInput1" value="{{$post->title}}" placeholder="title of the post">
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Post</label>
  <textarea name="post" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$post->post}}</textarea>
</div>
<div class="mt-5 mb-3">
  <label for="exampleFormControlInput1" class="form-label">tags</label>
  <input name="tags" type="text" class="form-control" id="exampleFormControlInput1" placeholder="tags of the post" value="@foreach ($post->tags as $tag) {{ $tag->name }}, @endforeach">
</div>
<input class="form-control" id="inputGroupFile02"  type="file" name="image">

<button type="submit" class="btn btn-primary mt-3">Edit</button>
</form>

@endsection
