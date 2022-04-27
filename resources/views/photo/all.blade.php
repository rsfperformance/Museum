@extends('welcome.full')

@section('content')
<section class="photos">
    <div class="container">
        <h2 class="photos__title section__title">
            {{ __('asd.Фото галерея') }}
        </h2>
        <div class="photos-content">
            @foreach(App\Photo::where('lang', $lan)->get() as $data)
            <div class="gallery-carousel__item">
                @if($data->photo_a != null)
                    <div class="gallery-carousel__img">
                        <img src="{{ $data->photo_a }}" alt="gallery" class="zoom-img">
                        <img src="/img/zoom.svg" alt="ico" class="zoom-open">
                        <p class="gallery-carousel__text">
                            {{ $data->header_a }}
                        </p>
                    </div>
                @endif
                <div class="gallery-carousel__wrap">
                    @if($data->photo_b != null)
                        <div class="gallery-carousel__half">
                            <div class="gallery-carousel__img">
                                <img src="{{ $data->photo_b }}" alt="gallery" class="zoom-img">
                                <img src="/img/zoom.svg" alt="ico" class="zoom-open">
                                <p class="gallery-carousel__text">
                                    {{ $data->header_b }}
                                </p>
                            </div>
                        </div>
                    @endif
                    <div class="gallery-carousel__half">
                        @if($data->photo_c != null)
                            <div class="gallery-carousel__img">
                                <img src="{{ $data->photo_c }}" alt="gallery" class="zoom-img">
                                <img src="/img/zoom.svg" alt="ico" class="zoom-open">
                                <p class="gallery-carousel__text">
                                    {{ $data->header_c }}
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="gallery-carousel__item gallery-carousel__item gallery-carousel__item-big">
                @if($data->photo_d != null)
                    <div class="gallery-carousel__img">
                        <img src="{{ $data->photo_d }}" alt="gallery" class="zoom-img">
                        <img src="/img/zoom.svg" alt="ico" class="zoom-open">
                        <p class="gallery-carousel__text">
                            {{ $data->header_d }}
                        </p>
                    </div>
                @endif
            </div>
            <div class="gallery-carousel__item">
                @if($data->photo_e != null)
                    <div class="gallery-carousel__img">
                        <img src="{{ $data->photo_e }}" alt="gallery" class="zoom-img">
                        <img src="/img/zoom.svg" alt="ico" class="zoom-open">
                        <p class="gallery-carousel__text">
                            {{ $data->header_e }}
                        </p>
                    </div>
                @endif
                @if($data->photo_f != null)
                    <div class="gallery-carousel__img">
                        <img src="{{ $data->photo_f }}" alt="gallery" class="zoom-img">
                        <img src="/img/zoom.svg" alt="ico" class="zoom-open">
                        <p class="gallery-carousel__text">
                            {{ $data->header_f }}
                        </p>
                    </div>
                @endif
            </div>
            @endforeach
        </div>
        {{--<div class="show-more">--}}
            {{--<a href="#" class="btn">{{ __('asd.Показать еще') }}</a>--}}
        {{--</div>--}}
    </div>
</section>
{{-- <section class="videos videos-photos">
    <div class="container">
        <h2 class="videos__title section__title">
            {{ __('asd.Видео галерея') }}
        </h2>
    </div>
    <div class="videos-main">
        <a href="/videos" class="btn videos-btn">
            {{ __('asd.Все видео') }}
        <div class="videos-arrows arrows">
            <span class="arrow arrow__left">
                <svg viewBox="0 0 10 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.4347 14.6032C8.63238 14.6043 8.82835 14.5691 9.01136 14.4995C9.19437 14.4299 9.36082 14.3274 9.50118 14.1979C9.64197 14.0679 9.75372 13.9134 9.82997 13.743C9.90623 13.5727 9.9455 13.39 9.9455 13.2055C9.9455 13.0209 9.90623 12.8382 9.82997 12.6679C9.75372 12.4976 9.64197 12.343 9.50118 12.213L4.52926 7.6143L9.30591 2.98762C9.58567 2.72572 9.7427 2.37145 9.7427 2.00218C9.7427 1.6329 9.58567 1.27863 9.30591 1.01674C9.16627 0.885723 9.00014 0.781735 8.81709 0.710771C8.63405 0.639807 8.43772 0.603271 8.23943 0.603271C8.04113 0.603271 7.8448 0.639807 7.66176 0.710771C7.47871 0.781735 7.31258 0.885723 7.17294 1.01674L1.37488 6.60789C1.09966 6.86918 0.945496 7.22047 0.945496 7.58634C0.945496 7.95222 1.09966 8.30351 1.37488 8.5648L7.38323 14.156C7.51806 14.2914 7.6804 14.4007 7.86087 14.4775C8.04134 14.5543 8.23637 14.597 8.4347 14.6032Z" fill="#CBCBCB"/>
                </svg>	
            </span>
            <span class="arrow arrow__right">
                <svg  viewBox="0 0 10 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.52044 0.995769C2.32276 0.994433 2.12674 1.02942 1.94364 1.09873C1.76053 1.16804 1.59393 1.2703 1.4534 1.39966C1.31243 1.52941 1.20047 1.68385 1.12398 1.85408C1.04748 2.02431 1.00797 2.20695 1.00772 2.39148C1.00746 2.576 1.04647 2.75875 1.1225 2.92919C1.19852 3.09963 1.31006 3.25438 1.45066 3.38452L6.41624 7.99009L1.63323 12.6102C1.3531 12.8717 1.19558 13.2258 1.19507 13.595C1.19457 13.9643 1.35111 14.3188 1.63051 14.5811C1.76997 14.7123 1.93596 14.8165 2.11891 14.8877C2.30185 14.9589 2.49813 14.9957 2.69643 14.996C2.89472 14.9963 3.0911 14.96 3.27424 14.8893C3.45738 14.8186 3.62366 14.7148 3.76348 14.584L9.56924 9.00084C9.84482 8.73994 9.99946 8.38886 9.99997 8.02298C10.0005 7.65711 9.8468 7.30561 9.57193 7.04394L3.57128 1.44451C3.43665 1.30883 3.27446 1.19932 3.09409 1.1223C2.91373 1.04528 2.71875 1.00227 2.52044 0.995769V0.995769Z" fill="#CBCBCB"/>
                </svg>					
            </span>
        </div>
        <div class="videos-carousel owl-carousel">
            @foreach(App\Video::all() as $data)
            <div class="videos-carousel__item">
                <iframe src="{{ $data->video }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            @endforeach
        </div>
    </div>
</section> --}}
<section class="videos videos-photos">
    <div class="container">
        <h2 class="videos__title section__title">
            {{ __('asd.Видео галерея') }}
        </h2>
    </div>
    <div class="videos-main">
        <a href="/videos" class="btn videos-btn">
           {{ __('asd.Все видео') }}
        </a>
        <div class="videos-arrows arrows">
            <span class="arrow arrow__left">
                <svg viewBox="0 0 10 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.4347 14.6032C8.63238 14.6043 8.82835 14.5691 9.01136 14.4995C9.19437 14.4299 9.36082 14.3274 9.50118 14.1979C9.64197 14.0679 9.75372 13.9134 9.82997 13.743C9.90623 13.5727 9.9455 13.39 9.9455 13.2055C9.9455 13.0209 9.90623 12.8382 9.82997 12.6679C9.75372 12.4976 9.64197 12.343 9.50118 12.213L4.52926 7.6143L9.30591 2.98762C9.58567 2.72572 9.7427 2.37145 9.7427 2.00218C9.7427 1.6329 9.58567 1.27863 9.30591 1.01674C9.16627 0.885723 9.00014 0.781735 8.81709 0.710771C8.63405 0.639807 8.43772 0.603271 8.23943 0.603271C8.04113 0.603271 7.8448 0.639807 7.66176 0.710771C7.47871 0.781735 7.31258 0.885723 7.17294 1.01674L1.37488 6.60789C1.09966 6.86918 0.945496 7.22047 0.945496 7.58634C0.945496 7.95222 1.09966 8.30351 1.37488 8.5648L7.38323 14.156C7.51806 14.2914 7.6804 14.4007 7.86087 14.4775C8.04134 14.5543 8.23637 14.597 8.4347 14.6032Z" fill="#CBCBCB"/>
                </svg>	
            </span>
            <span class="arrow arrow__right">
                <svg  viewBox="0 0 10 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.52044 0.995769C2.32276 0.994433 2.12674 1.02942 1.94364 1.09873C1.76053 1.16804 1.59393 1.2703 1.4534 1.39966C1.31243 1.52941 1.20047 1.68385 1.12398 1.85408C1.04748 2.02431 1.00797 2.20695 1.00772 2.39148C1.00746 2.576 1.04647 2.75875 1.1225 2.92919C1.19852 3.09963 1.31006 3.25438 1.45066 3.38452L6.41624 7.99009L1.63323 12.6102C1.3531 12.8717 1.19558 13.2258 1.19507 13.595C1.19457 13.9643 1.35111 14.3188 1.63051 14.5811C1.76997 14.7123 1.93596 14.8165 2.11891 14.8877C2.30185 14.9589 2.49813 14.9957 2.69643 14.996C2.89472 14.9963 3.0911 14.96 3.27424 14.8893C3.45738 14.8186 3.62366 14.7148 3.76348 14.584L9.56924 9.00084C9.84482 8.73994 9.99946 8.38886 9.99997 8.02298C10.0005 7.65711 9.8468 7.30561 9.57193 7.04394L3.57128 1.44451C3.43665 1.30883 3.27446 1.19932 3.09409 1.1223C2.91373 1.04528 2.71875 1.00227 2.52044 0.995769V0.995769Z" fill="#CBCBCB"/>
                </svg>					
            </span>
        </div>
        <div class="videos-carousel owl-carousel">
            @foreach(App\Video::all() as $data)
            <div class="videos-carousel__item">
                <iframe src="{{ $data->video }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            @endforeach
        </div>
    </div>
</section>
@include('welcome.subscription')
@endsection
