
<div class="card p-3 mb-4 shadow-sm">

    {{-- Tags --}}
    <div class="mb-5">
        <h5 class="card-title mb-3">🏷️ Tags</h5>
        <div class="d-flex flex-wrap gap-2">
            @foreach ($tags as $tag)
                <a href="{{ route('tags.show', $tag->id) }}" class="btn btn-sm btn-outline-secondary rounded-pill">
                    #{{ $tag->name }}
                </a>
            @endforeach
        </div>
    </div>

    {{-- Follow Us --}}
    <div class="mb-5">
        <h5 class="card-title mb-3">📱 Follow Us</h5>
        <div class="d-flex gap-3 fs-4">
            <a href="https://facebook.com/salhiakram01" class="text-primary" target="_blank">
                <i class="bi bi-facebook"></i>
            </a>
            <a href="https://twitter.com/salhiakram01" class="text-info" target="_blank">
                <i class="bi bi-twitter"></i>
            </a>
            <a href="https://instagram.com/akram_salhi_dz" class="text-danger" target="_blank">
                <i class="bi bi-instagram"></i>
            </a>
            <a href="https://youtube.com/akramsalhi" class="text-danger" target="_blank">
                <i class="bi bi-youtube"></i>
            </a>
        </div>
    </div>

    {{-- Recent Comments --}}
    <div class="mb-5">
        <h5 class="card-title mb-3">💬 Recent Comments</h5>
        <ul class="list-unstyled">
            @foreach ($recentComments as $comment)
                <li class="mb-3 border-bottom pb-2 small">
                    <strong>{{ $comment->commenter }}:</strong>
                    {{ Str::limit($comment->comment, 80) }} <br>
                    <a href="{{ route('posts.show', $comment->post_id) }}" class="text-decoration-none text-primary">
                        On: {{ $comment->post->title }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

</div>
