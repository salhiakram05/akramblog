@extends ("layouts.app")
@section("title")
index page
@endsection
@section("content")


<x-alert-errors />


@forelse ($posts as $post)
       <x-card :post="$post" />
@empty
<div class="alert alert-warning text-center">
       no posts with this tag yet
    </div>
@endforelse
@endsection


