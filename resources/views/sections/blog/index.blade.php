@extends('layouts.app')


@section('body')
    {{ \Diglactic\Breadcrumbs\Breadcrumbs::view('components.breadcrumbs', 'blog.index') }}

    <section class="section blog-news">
        <div class="section__topbar">
            <div class="section__title">Новости</div>
            <div class="section__topbar__btns">
                <div class="blog-news__sort">
                    <button class="btn blog-news__sort-btn">
                        <img src="{{ asset('img/icons/list.svg') }}" alt="list">
                    </button>
                    <button class="btn blog-news__sort-btn">
                        <img src="{{ asset('img/icons/cube2.svg') }}" alt="2 in row">
                    </button>
                </div>
            </div>
        </div>

        @include('components.page_search')

        <div class="blog-news__posts blog-news__posts_1">
            @if ($posts->count())
                @foreach ($posts as $post)
                    @include('components.blog.blog_post', ['post' => $post])
                @endforeach
            @else
                <p>Нет записей</p>
            @endif
        </div>

{{--        <div class="blog-news__posts blog-news__posts_2">--}}
{{--            @include('components.blog.blog_post')--}}
{{--            @include('components.blog.blog_post')--}}
{{--        </div>--}}

    </section>
@endsection
