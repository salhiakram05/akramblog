<form action="{{ route('posts.like', $post) }}" method="POST" class="like">
    @csrf
    <button type="submit" class="btn btn-sm btn-primary">
    @php
    $liked = $post->likes->contains('user_id', auth()->id()) ;
    @endphp
    @if ($liked)
   <i class="bi bi-suit-heart-fill liked"></i>
    @else
    <i class="bi bi-suit-heart"></i>

    @endif
    

    {{ $post->likes->count()}} Likes
    </button>
 </form>
