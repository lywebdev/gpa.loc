@extends('layouts.app')

@section('header_styles')
    <link rel="stylesheet" href="{{ asset('js/libs/swiper/swiper.min.css') }}"></link>
@endsection

@section('body')
    <!-- START slider section -->
    <section class="slider swiper">
        <div class="swiper-wrapper">
            <div class="slider__slide swiper-slide">
                <div class="slider__overlay">
{{--                    <div class="slider__subtitle">Гуманитарно-педагогическая академия</div>--}}
                    <div class="slider__title">
                        <span>Высшее образование, конкурсы</span>
                        <span>и исследования, конференции</span>
                        <span>и хакатоны</span>
                    </div>
                    <nav class="slider__links">
                        <ul>
                            <li><a href="#"><span>Поступление</span></a></li>
                            <li><a href="#"><span>Вакансии</span></a></li>
                            <li><a href="#"><span>Научные достижения</span></a></li>
                        </ul>
                    </nav>
                </div>
                <div class="slider__image">
                    <img src="{{ asset('img/slider/1.jpg') }}" alt="">
                </div>
            </div>
            <div class="swiper-slide">
                <div class="slider__overlay">
                    <div class="slider__subtitle">Дистанционное образование</div>
                    <div class="slider__title"></div>
                    <nav class="slider__links">
                        <ul>
                            <li><a href="#"><span>Электронный журнал</span></a></li>
                        </ul>
                    </nav>
                </div>
                <div class="slider__image">
                    <img src="{{ asset('img/slider/2.jpg') }}" alt="">
                </div>
            </div>
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
    </section>
    <!-- END slider section -->

    <!-- START latest blog posts section -->
    <section class="section section-news">
        <div class="section__title section__title_link"><a href="{{ route('blog.index') }}">Новости</a></div>
        <div class="section-news__posts">
            @foreach ($blogPosts as $post)
                @include('components.blog.blog_post', ['post' => $post])
            @endforeach
        </div>
    </section>
    <!-- END latest blog posts section -->

    <!-- START distance education section -->
    <section class="section section-distance-education">
        <div class="section__title">Дистанционное образование</div>
        <div class="section-distance-education__items">
            @include('components.info_card', [
                'image' => asset('img/info_cards/covid.jpg'),
                'title' => 'Коронавирус Live',
                'description' => 'Актуальная информация, статистика',
                'classes' => 'bg-blue',
                'link' => route('distanceEducation.covid')
            ])
            @include('components.info_card', [
                'image' => asset('img/info_cards/distant.jpg'),
                'title' => 'Процесс образования',
                'description' => 'Новости, инструменты, методика дистанционного...',
                'classes' => 'bg-red'
            ])
            @include('components.info_card', [
                'image' => asset('img/info_cards/library.jpg'),
                'title' => 'Электронные библиотеки',
                'description' => 'Список электронных библиотек, справочников',
                'classes' => 'bg-black'
            ])
            @include('components.info_card', [
                'image' => asset('img/info_cards/programs.jpg'),
                'title' => 'Программы направлений',
                'description' => 'Информация об учебном плане для каждой из программ подготовок',
                'classes' => 'bg-black'
            ])
        </div>
        <a href="#" class="section-distance-education__btn">
            <span>
                <img src="{{ asset('img/icons/book.svg') }}" alt="">
            </span>Электронный журнал</a>
    </section>
    <!-- END distance education section -->

    <!-- START events section -->
    <section class="events">
        <div class="events__top">
            <div class="events__title">События</div>
            <div class="events__path-arrow"></div>
            <ul class="events__tabs-nav">
                <li class="events__tabs-nav__item active">Текущие</li>
                <li class="events__tabs-nav__item">Прошедшие</li>
                <li class="events__tabs-nav__item">Предшествующие</li>
            </ul>
        </div>
        <div class="events__body">
            @foreach ($universityCurrentEvents as $event)
                <div class="events__item">
                    <a href="#" class="events__item__title">{{ $event->name }}</a>
                    <div class="events__item__date">
                        <span class="description">Свершится:</span>
                        <span class="date">{{ \Jenssegers\Date\Date::create($event->date)->format('d F Y') }} года</span>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- END events section -->
@endsection


@section('footer_scripts')
    <script src="{{ asset('js/libs/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('js/components/home_init.js') }}"></script>
@endsection
