@extends("layouts.app")

@section("title")
    Index Page
@endsection

@section("content")

    <x-alert-errors />

    <div class="row">
        {{-- Main Content --}}
        <div class="col-md-8 mb-4">
            @foreach ($posts as $post)
                <x-card :post="$post" />
            @endforeach
        </div>

        {{-- Sidebar --}}
        <div class="col-md-4">
            <x-sidebar :tags="$tags" :recentComments="$recentComments" />
        </div>
    </div>

@endsection
