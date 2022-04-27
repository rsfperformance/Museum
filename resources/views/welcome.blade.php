@extends('welcome.full')

@section('preload')
    <?php
    session()->push('preloader', $_SERVER['REMOTE_ADDR']);
//    $preloader = session()->get('preloader');
    ?>
    {{--@if(!isset($_SERVER['REMOTE_ADDR'], $preloader))--}}
        <div class="preloader">
        	<audio loop id="preloaderAudio">
        		<source src="/audio/preload.mp3">
        	</audio>
            <div class="preloader-video">
                <video autoplay="" loop="" muted="" playsinline="" webkit-playsinline="">
                    <source type="video/mp4" src="/video/preloader.mp4">
                    {{ __('asd.Ваш браузер не поддерживает HTML5 видео.') }}
                </video>
            </div>
            <div class="preloader-content">
                <div class="preloader__logo">
                    <img src="/img/logo-big-{{ session()->get('locale') }}.png" alt="Museum({{ session()->get('locale') }})">
                </div>
                <div class="preloader-wrap">
                    <div class="preloader__text">
                       {{ __('asd.ДЛЯ ВОСПРОИЗВЕДЕНИЯ ЗВУКОВОГО ЭФФЕКТА НАЖМИТЕ КНОПКУ НИЖЕ') }}
                    </div>
                    <div class="preloader-btns">
                        <a href="#" class="preloader__btn btn">{{ __('asd.Перейти на сайт') }}</a>
                        <a href="#" class="preloader-off">
    						<svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
    							<g clip-path="url(#clip0)">
    							<path d="M17.0042 10.2761L18.837 8.44333C19.0544 8.22595 19.0544 7.87355 18.837 7.6562C18.6196 7.43882 18.2672 7.43882 18.0499 7.6562L16.217 9.48904L14.3842 7.6562C14.1668 7.43882 13.8144 7.43882 13.5971 7.6562C13.3797 7.87359 13.3797 8.22598 13.5971 8.44333L15.4299 10.2761L13.5971 12.1089C13.3797 12.3263 13.3797 12.6787 13.5971 12.8961C13.8144 13.1134 14.1668 13.1134 14.3842 12.8961L16.217 11.0632L18.0499 12.8961C18.2672 13.1134 18.6196 13.1134 18.837 12.8961C19.0544 12.6787 19.0544 12.3263 18.837 12.1089L17.0042 10.2761Z" fill="white"/>
    							<path d="M11.2836 0.1607C10.6906 -0.117101 10.0096 -0.0292263 9.50644 0.390073L4.80786 4.30553H1.66981C0.749054 4.30553 0 5.05458 0 5.97534V13.0254C0 13.9461 0.749054 14.6952 1.66981 14.6952H4.8079L9.50648 18.6107C10.0101 19.0304 10.6912 19.1176 11.2837 18.8401C11.8768 18.5623 12.2452 17.9828 12.2452 17.3279V1.67284C12.2452 1.01789 11.8768 0.438501 11.2836 0.1607ZM4.4528 13.5894H1.66981C1.36292 13.5894 1.11321 13.3323 1.11321 13.0254V5.97534C1.11321 5.66845 1.36292 5.41874 1.66981 5.41874H4.4528V13.5894ZM11.132 17.3279C11.132 17.6562 10.8867 17.7967 10.8115 17.8319C10.7363 17.8671 10.4714 17.9657 10.2191 17.7554L5.56601 13.8779V5.12283L10.2191 1.24526C10.4714 1.035 10.7364 1.13356 10.8115 1.16878C10.8867 1.20399 11.132 1.34442 11.132 1.67284V17.3279Z" fill="white"/>
    							</g>
    							<defs>
    							<clipPath id="clip0">
    							<rect width="19" height="19" fill="white"/>
    							</clipPath>
    							</defs>
    						</svg>	
    					</a>
    					<a href="#" class="preloader-on">
    						<svg width="13" height="19" viewBox="0 0 13 19" fill="none" xmlns="http://www.w3.org/2000/svg">
    							<path d="M11.2836 0.1607C10.6906 -0.117101 10.0096 -0.0292263 9.50644 0.390073L4.80786 4.30553H1.66981C0.749054 4.30553 0 5.05458 0 5.97534V13.0254C0 13.9461 0.749054 14.6952 1.66981 14.6952H4.8079L9.50648 18.6107C10.0101 19.0304 10.6912 19.1176 11.2837 18.8401C11.8768 18.5623 12.2452 17.9828 12.2452 17.3279V1.67284C12.2452 1.01789 11.8768 0.438501 11.2836 0.1607ZM4.4528 13.5894H1.66981C1.36292 13.5894 1.11321 13.3323 1.11321 13.0254V5.97534C1.11321 5.66845 1.36292 5.41874 1.66981 5.41874H4.4528V13.5894ZM11.132 17.3279C11.132 17.6562 10.8867 17.7967 10.8115 17.8319C10.7363 17.8671 10.4714 17.9657 10.2191 17.7554L5.56601 13.8779V5.12283L10.2191 1.24526C10.4714 1.035 10.7364 1.13356 10.8115 1.16878C10.8867 1.20399 11.132 1.34442 11.132 1.67284V17.3279Z" fill="white"/>
    						</svg>					
    					</a>
                    </div>
                </div>
            </div>
        </div>
    {{--@endif--}}
@endsection

@section('content')
    <section class="main">
        <div class="main-360">
            <img src="/img/360.jpg" alt="img">
        </div>
        <div class="main-content">
            <h1 class="main__title">
                {!! __('asd.Музей <br> узбекской семьи') !!}
            </h1>
            <div class="main__btns">
                <a href="/about" class="main__btn btn">
                    {{ __('asd.О музее') }}
                </a>
                <a href="/history/1" class="main__btn  main__btn-white btn">
                    {{ __('asd.История') }}
                </a>
            </div>
        </div>
        <div class="main-arrows">
        <span class="main-arrow main-arrow__left">
            <img data-src="/img/left-arrow.svg" alt="ico" class="lazy">
        </span>
            <span class="main-arrow main-arrow__right">
            <img data-src="/img/right-arrow.svg" alt="ico" class="lazy">
        </span>
        </div>
        <div class="main-carousel__wrap">
            <div class="main-carousel owl-carousel">
                @foreach (App\Slayder::orderBy('id')->take(5)->get() as $data)
                    <div class="main-carousel__item">
                        <img src="{{ $data->photo }}" alt="gallery">
                    </div>
                @endforeach
            </div>
            <a href="https://roundme.com/tour/334344/view/1110454/" class="main-close">
                <div class="main-close__wrap">
                    <img data-src="/img/360-degrees.svg" alt="ico" class="img-fluid lazy">
                    <span>{{ __('asd.3D Тур') }}</span>
                </div>
            </a>
        </div>
    </section>

    <section class="about">
        <div class="container">
            <div class="about-content wow fadeInLeft" data-wow-delay=".5s">
                <h2 class="about__title section__title">
                    {{ __('asd.О музее') }}
                </h2>
                @foreach(App\About::where('lang', $lan)->take(3)->get() as $data)
                    <p class="about__text">
                        {!! $data->description !!}
                    </p>
                    <div class="about__numbers about__numbers-anim">
                        <div class="about-number">
                            <div class="about-number__count">
                                <span>2020</span> г.
                            </div>
                            <div class="about-number__text">
                                {{ __('asd.год основания') }}
                            </div>
                        </div>
                        <div class="about-number">
                            <div class="about-number__count">
                                <span>{{ $data->visitors }}</span>+
                            </div>
                            <div class="about-number__text">
                                {{ __('asd.посетителей') }}
                            </div>
                        </div>
                        <div class="about-number">
                            <div class="about-number__count">
                                <span>{{ $data->photonumb }}</span>+
                            </div>
                            <div class="about-number__text">
                                {{ __('asd.фото и публикаций') }}
                            </div>
                        </div>
                    </div>
                @endforeach
                <a href="/about" class="about__btn btn">
                    {{ __('asd.Подробнее') }}
                </a>
            </div>
            <div class="about-img">
                <div class="about-img__wrap">
                    <img data-src="/img/about1.jpg" alt="about" class="wow fadeInRight lazy" data-wow-delay=".5s">
                </div>
                <div class="about-img__wrap">
                    <img data-src="/img/about2.jpg" alt="about" class="wow fadeInRight lazy" data-wow-delay="1s">
                </div>
            </div>
        </div>
    </section>

    <section class="history">
        <div class="container">
            <h2 class="history__title section__title">
                {!! __('asd.История узбекской семьи') !!}
            </h2>
        </div>
        <div class="history-line">
            <span></span>
        </div>
        <div class="container">
            <div class="history-main">
                @foreach(App\History::where('lang', $lan)->take(3)->get() as $data)
                    <div class="history-carousel__item">
                        <h3 class="history-carousel__title">
                            {{ $data->header }}
                        </h3>
                        <div class="history-carousel__dot">
                            <span></span>
                        </div>
                        <div class="history-carousel__img wow fadeInLeft" data-wow-delay=".3s">
                            <img data-src="{{ $data->photo_a }}" class="lazy" alt="history">
                            <a href="/history/{{ $data->one_id }}">{{ __('asd.Подробнее') }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="marry">
        <div class="container">
            <h2 class="marry__title section__title">
                {{ __('asd.Формы брака') }}
            </h2>
            <div class="marry-main wow fadeInUp" data-wow-delay=".5s">
                @foreach(App\Type::where('lang', $lan)->get() as $data)
                    <a href="/type/{{ $data->one_id }}" class="marry-item">
                        <img data-src="{{ $data->photo_a }}" class="lazy" alt="marriage">
                        <div class="marry-item__letter">
                            {{ substr($data->header, 0,1) }}
                        </div>
                        <h4 class="marry-item__name">
                            {{ $data->header }}
                        </h4>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <section class="family">
        <div class="container">
            <h2 class="family__title section__title">
                {{ __('asd.Формы семьи') }}
            </h2>
            <div class="family-main">
                @foreach(App\Familyform::where('lang', $lan)->take(4)->get() as $data)
                    <a href="/familyform/{{ $data->one_id }}" class="family-item wow fadeInLeft" data-wow-delay=".5s">
                        <img data-src="{{ $data->photo }}" class="lazy" alt="family">
                        <div class="family-item__title">
                            {{ $data->header }}
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <section class="quotes">
        <div class="container">
            <div class="quotes-carousel owl-carousel">
                @foreach(App\Quote::where('lang', $lan)->take(3)->get() as $data)
                    <div class="quotes-carousel__item">
                        <div class="quotes-carousel__wrap">
                            <small class="quotes-carousel__small">
                                {{ __('asd.Мысли великих людей') }}
                            </small>
                            <p class="quotes-carousel__text">
                                {{ $data->quote }}
                            </p>
                            <h3 class="quotes-carousel__autor">
                                {{ $data->author }}
                            </h3>
                        </div>
                        <div class="quotes-carousel__img">
                            <img data-src="{{ $data->photo }}" class="lazy" alt="Omar">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="ceremony">
        <div class="container">
            <h2 class="ceremony__title section__title">
                {{ __('asd.Семейный церемониал') }}
            </h2>
            <div class="ceremony-all all">
                <a href="/familyall">{{ __('asd.Все статьи') }}</a>
                <div class="ceremony-arrows arrows">
                {{--<span class="arrow arrow__left">--}}
                    {{--<svg viewBox="0 0 10 15" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
                        {{--<path d="M8.4347 14.6032C8.63238 14.6043 8.82835 14.5691 9.01136 14.4995C9.19437 14.4299 9.36082 14.3274 9.50118 14.1979C9.64197 14.0679 9.75372 13.9134 9.82997 13.743C9.90623 13.5727 9.9455 13.39 9.9455 13.2055C9.9455 13.0209 9.90623 12.8382 9.82997 12.6679C9.75372 12.4976 9.64197 12.343 9.50118 12.213L4.52926 7.6143L9.30591 2.98762C9.58567 2.72572 9.7427 2.37145 9.7427 2.00218C9.7427 1.6329 9.58567 1.27863 9.30591 1.01674C9.16627 0.885723 9.00014 0.781735 8.81709 0.710771C8.63405 0.639807 8.43772 0.603271 8.23943 0.603271C8.04113 0.603271 7.8448 0.639807 7.66176 0.710771C7.47871 0.781735 7.31258 0.885723 7.17294 1.01674L1.37488 6.60789C1.09966 6.86918 0.945496 7.22047 0.945496 7.58634C0.945496 7.95222 1.09966 8.30351 1.37488 8.5648L7.38323 14.156C7.51806 14.2914 7.6804 14.4007 7.86087 14.4775C8.04134 14.5543 8.23637 14.597 8.4347 14.6032Z" fill="#CBCBCB"/>--}}
                    {{--</svg>--}}
                {{--</span>--}}
                    {{--<span class="arrow arrow__right">--}}
                    {{--<svg  viewBox="0 0 10 15" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
                        {{--<path d="M2.52044 0.995769C2.32276 0.994433 2.12674 1.02942 1.94364 1.09873C1.76053 1.16804 1.59393 1.2703 1.4534 1.39966C1.31243 1.52941 1.20047 1.68385 1.12398 1.85408C1.04748 2.02431 1.00797 2.20695 1.00772 2.39148C1.00746 2.576 1.04647 2.75875 1.1225 2.92919C1.19852 3.09963 1.31006 3.25438 1.45066 3.38452L6.41624 7.99009L1.63323 12.6102C1.3531 12.8717 1.19558 13.2258 1.19507 13.595C1.19457 13.9643 1.35111 14.3188 1.63051 14.5811C1.76997 14.7123 1.93596 14.8165 2.11891 14.8877C2.30185 14.9589 2.49813 14.9957 2.69643 14.996C2.89472 14.9963 3.0911 14.96 3.27424 14.8893C3.45738 14.8186 3.62366 14.7148 3.76348 14.584L9.56924 9.00084C9.84482 8.73994 9.99946 8.38886 9.99997 8.02298C10.0005 7.65711 9.8468 7.30561 9.57193 7.04394L3.57128 1.44451C3.43665 1.30883 3.27446 1.19932 3.09409 1.1223C2.91373 1.04528 2.71875 1.00227 2.52044 0.995769V0.995769Z" fill="#CBCBCB"/>--}}
                    {{--</svg>--}}
                {{--</span>--}}
                </div>
            </div>
            <div class="ceremony-carousel owl-carousel">
                @foreach(App\Family::where('one_id', 1)->get() as $data)
                    @if($data->lang == $lan)
                        <a href="/family/{{ $data->one_id }}" class="ceremony-carousel__item wow fadeInLeft" data-wow-delay=".5s">
                            <h4 class="ceremony-carousel__title">
                                {{ $data->header }}
                            </h4>
                            <p class="ceremony-carousel__text">
                                {{ substr($data->description_a, 3, 150) }}...
                            </p>
                            <div class="ceremony-carousel__wrap">
                                 <span>{{ $data->type_of_cerimony }}</span>
                                <span>{{ __('asd.Читать') }}</span>
                            </div>
                            <img data-src="{{ $data->photo_a }}" class="lazy" alt="ceremony">
                        </a>
                    @endif
                @endforeach
                    @foreach(App\Family::where('one_id', 3)->get() as $data)
                        @if($data->lang == $lan)
                            <a href="/family/{{ $data->one_id }}" class="ceremony-carousel__item wow fadeInLeft"
                               data-wow-delay=".5s">
                                <h4 class="ceremony-carousel__title">
                                    {{ $data->header }}
                                </h4>
                                <p class="ceremony-carousel__text">
                                    {{ substr($data->description_a, 3, 150) }}...
                                </p>
                                <div class="ceremony-carousel__wrap">
                                    <span>{{ $data->type_of_cerimony }}</span>
                                    <span>{{ __('asd.Читать') }}</span>
                                </div>
                                <img data-src="{{ $data->photo_a }}" class="lazy" alt="ceremony">
                            </a>
                        @endif
                    @endforeach
                    @foreach(App\Family::where('one_id', 2)->get() as $data)
                        @if($data->lang == $lan)
                            <a href="/family/{{ $data->one_id }}" class="ceremony-carousel__item wow fadeInLeft" data-wow-delay=".5s">
                                <h4 class="ceremony-carousel__title">
                                    {{ $data->header }}
                                </h4>
                                <p class="ceremony-carousel__text">
                                    {{ substr($data->description_a, 3, 150) }}...
                                </p>
                                <div class="ceremony-carousel__wrap">
                                    <span>{{ $data->type_of_cerimony }}</span>
                                    <span>{{ __('asd.Читать') }}</span>
                                </div>
                                <img data-src="{{ $data->photo_a }}" class="lazy" alt="ceremony">
                            </a>
                        @endif
                    @endforeach
            </div>
        </div>
        <div class="ceremony-video__wrap">
            <div class="ceremony-video owl-carousel">
                @foreach(App\Minivideo::orderBy('id', 'asc')->take(4)->get() as $data)
                    <div class="ceremony-video__item">
                        <iframe data-src="{{ $data->video }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                @endforeach
            </div>
            <div class="ceremony-video__arrows arrows">
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
        </div>
    </section>

    <section class="sources">
        <div class="container">
            <h2 class="sources__title section__title">
                {{ __('asd.Полезные ресурсы') }}
            </h2>
            <div class="sources-all all">
                <a href="/usefulall/1">{{ __('asd.Все ресурсы') }}</a>
                <div class="sources-arrows arrows">
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
            </div>

            <div class="sources-carousel owl-carousel wow fadeInRight" data-wow-delay=".5s">
                @foreach(App\Useful::all()->random(100) as $data)
                    @if($data->lang == $lan)
                        <div class="sources-carousel__item">
                            <img data-src="{{ $data->photo }}" class="lazy" alt="source">
                            <a @if($data->type != 1 && $data->type != 7) href="/useful/{{ $data->type }}"
                               @else href="{{ $data->link }}" @endif class="sources-carousel__link">
                                <div class="sources-carousel__info">
                                    <span>{{ $data->created_at->format('M d Y') }} </span>
                                    <span>
                                                    @if($data->type == 1) {{ __('asd.Монографии') }} @endif
                                        @if($data->type == 2) {{ __('asd.Публикации') }} @endif
                                        @if($data->type == 3) {{ __('asd.Научные статьи') }} @endif
                                        @if($data->type == 4) {{ __('asd.Диссертации') }} @endif
                                        @if($data->type == 5) {{ __('asd.Статьи в СМИ') }} @endif
                                        @if($data->type == 6) {{ __('asd.Изречения, пословицы, поговорки, <br> стихи') }}  @endif
                                        @if($data->type == 7) {{ __('asd.Полезные ссылки') }}  @endif
                                                </span>
                                </div>
                                <div class="sources-carousel__name">
                                    {{ $data->header }}
                                </div>
                                <div class="sources-carousel__more">
                                    {{ __('asd.Подробнее') }}
                                </div>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <section class="gallery">
        <div class="container">
            <h2 class="gallery__title section__title">
                {{ __('asd.Фото галерея') }}
            </h2>
            <div class="gallery-all all">
                <a href="/photos">{{ __('asd.Все фото') }}</a>
                <div class="gallery-arrows arrows">
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
            </div>
        </div>
        <div class="gallery-carousel owl-carousel">
            @foreach(App\Photo::where('lang', $lan)->take(2)->get() as $data)
                <div class="gallery-carousel__item">
                    <div class="gallery-carousel__img">
                        <img src="{{ $data->photo_a }}" alt="gallery" class="zoom-img">
                        <img src="/img/zoom.svg" alt="ico" class="zoom-open">
                        <p class="gallery-carousel__text">
                            {{ $data->header_a }}
                        </p>
                    </div>
                    <div class="gallery-carousel__wrap">
                        <div class="gallery-carousel__half">
                            <div class="gallery-carousel__img">
                                <img src="{{ $data->photo_b }}" alt="gallery" class="zoom-img">
                                <img src="/img/zoom.svg" alt="ico" class="zoom-open">
                                <p class="gallery-carousel__text">
                                    {{ $data->header_b }}
                                </p>
                            </div>
                        </div>
                        <div class="gallery-carousel__half">
                            <div class="gallery-carousel__img">
                                <img src="{{ $data->photo_c }}" alt="gallery" class="zoom-img">
                                <img src="/img/zoom.svg" alt="ico" class="zoom-open">
                                <p class="gallery-carousel__text">
                                    {{ $data->header_c }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gallery-carousel__item gallery-carousel__item-big">
                    <div class="gallery-carousel__img">
                        <img src="{{ $data->photo_d }}" alt="gallery" class="zoom-img">
                        <img src="/img/zoom.svg" alt="ico" class="zoom-open">
                        <p class="gallery-carousel__text">
                            {{ $data->header_d }}
                        </p>
                    </div>
                </div>
                <div class="gallery-carousel__item">
                    <div class="gallery-carousel__img">
                        <img src="{{ $data->photo_e }}" alt="gallery" class="zoom-img">
                        <img src="/img/zoom.svg" alt="ico" class="zoom-open">
                        <p class="gallery-carousel__text">
                            {{ $data->header_e }}
                        </p>
                    </div>
                    <div class="gallery-carousel__img">
                        <img src="{{ $data->photo_f }}" alt="gallery" class="zoom-img">
                        <img src="/img/zoom.svg" alt="ico" class="zoom-open">
                        <p class="gallery-carousel__text">
                            {{ $data->header_f }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="videos">
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
                @foreach(App\Video::orderBy('id')->take(6)->get() as $data)
                    <div class="videos-carousel__item">
                        <iframe data-src="{{ $data->video }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="art">
        <div class="container">
            <h2 class="art__title section__title">
                {{ __('asd.Арт галерея') }}
            </h2>
            <div class="art-all all">
                <a href="/arts">{{ __('asd.Вся галерея') }}</a>
                <div class="art-arrows arrows">
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
            </div>
            <div class="art-carousel owl-carousel wow fadeIn" data-wow-delay=".5s">
                <?php $k=0 ?>
                @foreach(App\Art::inRandomOrder()->first()->get() as $data)
                    @if($data->lang == $lan)
                        <?php $k++ ?>
                            @if($k<=5)
                                <div class="art-carousel__item">
                                    <div class="art-carousel__img">
                                        <img data-src="{{ $data->photo }}" alt="gallery" class="zoom-img lazy">
                                        <img data-src="/img/zoom.svg" alt="ico" class="zoom-open lazy">
                                    </div>
                                    <div class="art-carousel__table">
                                        {{ $data->header }}
                                    </div>
                                </div>
                            @endif
                    @endif
                @endforeach
            </div>
        </div>
    </section>


    @section('script')
        <script>
            let sound = document.querySelector('#playAudio');
            let preloaderAudio = document.querySelector('#preloaderAudio');
            sound.volume = 0.4;
            preloaderAudio.volume = 0.4
            
            
            $('.preloader-on').click(function(e) {
                e.preventDefault()
                $(this).hide()
                preloaderAudio.play()
                $('.preloader-off').show()
            })
            
            $('.preloader-off').click(function(e) {
                e.preventDefault()
                $(this).hide()
                preloaderAudio.pause()
                $('.preloader-on').show()
            })



            $('.preloader__btn').click(function(e) {
                e.preventDefault();
                $('.preloader').fadeOut(1000);
                $('.preloader-video source').attr('src', '');
                $(window).scrollTop(0);
                preloaderAudio.pause();
                sound.play();
                $('.sound-on').css('display', 'none');
                $('.sound-off').css('display', 'flex');
            })

        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var lazyloadImages = document.querySelectorAll("img.lazy");
                console.log(lazyloadImages);
                var lazyloadThrottleTimeout;

                function lazyload () {
                    if(lazyloadThrottleTimeout) {
                        clearTimeout(lazyloadThrottleTimeout);
                    }

                    lazyloadThrottleTimeout = setTimeout(function() {
                        var scrollTop = window.pageYOffset;
                        lazyloadImages.forEach(function(img) {
                            if(img.offsetTop < (window.innerHeight + scrollTop)) {
                                img.src = img.dataset.src;
                                img.classList.remove('lazy');
                            }
                        });
                        if(lazyloadImages.length == 0) {
                            document.removeEventListener("scroll", lazyload);
                            window.removeEventListener("resize", lazyload);
                            window.removeEventListener("orientationChange", lazyload);
                        }
                    }, 20);
                }

                document.addEventListener("scroll", lazyload);
                window.addEventListener("resize", lazyload);
                window.addEventListener("orientationChange", lazyload);
            });

            $(window).on('load', () => {
                setTimeout(() => {
                    $('iframe').map((index, item) => {
                        let src = $(item).data('src')
                        $(item).attr('src', src)
                    })
                }, 3000)
            })
        </script>
    @endsection

@endsection
