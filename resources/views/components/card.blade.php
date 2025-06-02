<div class="card" >
 <div class="card-body">
  <div class="publisher mb-3">
   <img  height="35" width="35" src="https://ui-avatars.com/api/?name={{ urlencode($post->user->name) }}&background=random&color=fff" 
     class="rounded-circle me-2" width="35" height="35" alt="{{ $post->user->name }}">
   <b>{{ $post->user->name }}</b>
  </div>
    <h4 class="card-title  mb-2"><a href="{{route('posts.show' , $post->id )}}"> {{$post->title}} </a></h4>
    <x-tags :tags="$post->tags" />
    @if ($post->path)
        <img width="100%" height="auto" src="{{ asset('storage/' . $post->path) }}" class="rounded d-block mt-3 mb-3" alt="صورة">
    @endif

    
   <div class="mb-3" style="color:#5a5a5a;font-size:16px">at {{$post->created_at->format("d-m-Y h:i")}}  </div>

   <x-like :post="$post" />

    <a class="addcomment" href="{{ route('posts.show', $post->id) }}#addcomment" >
    <i class="bi bi-chat"></i>
    @if ($post->comments->count() > 0)
       {{$post->comments->count()}} Comments 
    @else
       Add Comment
    @endif
    </a>
</div>
</div>
