@extends('layouts.app')

@section('title', $user->name)

@section('content')
<div class="container py-6">

    <div class="mb-4 p-4 bg-light rounded shadow-sm">

    <div class="d-flex align-items-center mb-3">
        <img 
            src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=random&color=fff" 
            height="60" width="60" 
            class="rounded-circle me-3 border border-2" 
            alt="{{ $user->name }}"
        >
        <div>
            <h4 class="mb-0">{{ $user->name }}</h4>
            <small class="text-muted">{{ '@' . $user->username }}</small>
        </div>
    </div>

    <ul class="list-unstyled mb-0">
       
        <li>
            <i class="bi bi-envelope-fill me-2 text-primary"></i>
            <strong>Email:</strong> {{ $user->email }}
        </li>
    </ul>

</div>


    <h4 class="mb-3">📝 Articles by {{ $user->name }}</h4>

    @if($posts->count())
        <div class="d-flex flex-column gap-3">
            @foreach($posts as $post)
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ Str::limit($post->body, 150) }}</p>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-primary rmlink">Read more</a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    @else
        <p>No articles yet.</p>
    @endif

</div>
@endsection
