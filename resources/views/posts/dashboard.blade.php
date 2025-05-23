@extends ("layouts.app")
@section("title")
index page
@endsection
@section("content")
<div class="mt-5">
    <x-alert-errors />

    <div class="text-center"> <a href="{{route('posts.create')}}" class="btn btn-primary">Create post</a> </div>
   <table class="table mt-3">
    <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">title</th>
      <th scope="col">created at</th>
       <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($posts as $post)
    <tr>
      <th scope="row">{{$post->id}}</th>
      <td>{{$post->title}}</td>
      <td>{{$post->created_at->format("Y-m-d H:i")}}</td>
      <td>
        <a class="btn btn-info" href="{{route('posts.show' , $post->id ) }} " role="button">view</a>
        <a class="btn btn-primary" href="{{route('posts.edit' , $post->id)}}" role="button">edit</a>
        <form style="display:inline" method="post" action="{{route('posts.destroy' , $post->id)}}" onsubmit="return confirm('are you sure?')">
        @csrf
        @method("delete")
        <button class="btn btn-danger"  role="button">delete</button>
        </form>
      </td>
    </tr>
   
    
    @endforeach
    </tbody>

 
    </table>

</div>

@endsection


