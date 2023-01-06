<a href="{{ route('blog.post', $post->slug) }}" class="blog-post">
    <div class="blog-post__overlay">
        <div class="blog-post__image">
            <img src="@if (!is_null($post->preview)) {{ \Illuminate\Support\Facades\Storage::url($post->preview) }} @else {{ isset($post->firstPhoto) ? \Illuminate\Support\Facades\Storage::url($post->firstPhoto->filename) : '' }} @endif" alt="{{ $post->title }}">
        </div>
        <div class="blog-post__date">
            <div class="blog-post__date__day">{{ \Illuminate\Support\Carbon::parse($post->created_at)->translatedFormat('d') }}</div>
            <div class="blog-post__date__bottom">{{ \Illuminate\Support\Carbon::parse($post->created_at)->translatedFormat('m.Y') }}</div>
        </div>
    </div>
    <div class="blog-post__title">{{ $post->title }}</div>
</a>
