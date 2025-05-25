@extends ("layouts.app")
@section("title")
create post
@endsection
@section("content")


<x-alert-errors />

<form  enctype="multipart/form-data" method="POST" action="{{route('posts.store')}}" >
@csrf
<div class="mt-5 mb-3">
  <label for="exampleFormControlInput1" class="form-label">title</label>
  <input name="title" type="text" class="form-control" id="exampleFormControlInput1" placeholder="title of the post" value="{{old('title')}}">
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Post</label>
  <textarea name="post" class="form-control" id="exampleFormControlTextarea1" rows="3">{{old('post')}}</textarea>
</div>
<div class="mt-5 mb-3">
  <label for="exampleFormControlInput1" class="form-label">tags</label>
  <input name="tags" type="text" class="form-control" id="exampleFormControlInput1" placeholder="tags of the post" value="{{old('tags')}}">
</div>
    <input class="form-control" id="inputGroupFile02"  type="file" name="image">

<button type="submit" class="btn btn-success mt-3">Success</button>
</form>

@endsection
