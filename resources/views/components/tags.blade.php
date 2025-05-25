<ul class="tags-list mb-3">
    @foreach ($tags as $tag)
       <a href="{{ route('tags.show', $tag->id) }}">
                #{{ $tag->name }}
       </a>
    @endforeach
</ul>
