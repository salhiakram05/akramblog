@extends ("layouts.app")
@section("title")
index page
@endsection
@section("content")


<x-alert-errors />


@foreach ($posts as $post)
    <x-card :post="$post" />

@endforeach
@endsection


