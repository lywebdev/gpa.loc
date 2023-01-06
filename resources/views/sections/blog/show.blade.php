@extends('layouts.app')


@section('body')
    {{ \Diglactic\Breadcrumbs\Breadcrumbs::view('components.breadcrumbs', 'blog.post', $post) }}

    <div class="section blog-post-page">
        <div class="section__title">{{ $post->title }}</div>
        <div class="blog-post-page__image">
            <img src="@if (!is_null($post->preview)) {{ \Illuminate\Support\Facades\Storage::url($post->preview) }} @else {{ isset($post->firstPhoto) ? \Illuminate\Support\Facades\Storage::url($post->firstPhoto->filename) : '' }} @endif" alt="{{ $post->title }}">
{{--            <div class="blog-post-page__image-overlay"></div>--}}
        </div>
        @if ($post->photos->count())
            <div class="blog-post-page__slider">
                <!-- START slider section -->
                <div class="slider swiper">
                    <div class="swiper-wrapper">
                        @foreach ($post->photos as $photo)
                            <div class="swiper-slide">
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($photo->filename) }}" alt="">
                            </div>
                        @endforeach
                    </div>

                    <div class="slider__nav">
                        <div class="slider-btn-prev">
                            <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.70176 4.98463e-07L6.38033e-07 5.70175L4.98463e-07 7.29825L5.70175 13L7.32105 11.4035L3.5807 7.64035L16.2842 7.64035L16.2842 5.35965L3.5807 5.35965L7.34386 1.59649L5.70176 4.98463e-07Z" fill="#212B3A"/>
                            </svg>
                        </div>
                        <div class="slider-btn-next">
                            <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.70176 4.98463e-07L6.38033e-07 5.70175L4.98463e-07 7.29825L5.70175 13L7.32105 11.4035L3.5807 7.64035L16.2842 7.64035L16.2842 5.35965L3.5807 5.35965L7.34386 1.59649L5.70176 4.98463e-07Z" fill="#212B3A"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <!-- END slider section -->
            </div>
        @endif
        <div class="blog-post-page__content">
            {!! $post->content !!}
        </div>
    </div>

@endsection

@section('footer_scripts')
    <script src="{{ asset('js/pages/blog_show.js') }}"></script>
@endsection
