@extends('welcome.full')

@section('content')
    @foreach(App\About::where('lang', $lan)->get() as $data)
        <section class="about">
            <div class="container">
                <div class="about-content">
                    <h2 class="about__title section__title">
                        {{ __('asd.О музее') }}
                    </h2>
                    <p class="about__text">
                        {!! $data->description !!}
                    </p>
                    <div class="about__numbers">
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
                </div>
                <div class="about-img">
                    <div class="about-img__wrap">
                        <img src="/img/about1.jpg" alt="about">
                    </div>
                    <div class="about-img__wrap">
                        <img src="/img/about2.jpg" alt="about">
                    </div>
                </div>
            </div>
        </section>
        <section class="mission">
            <div class="container">
                <h2 class="mission__title section__title">
                    {{ __('asd.Наша миссия') }}
                </h2>
                <div class="mission-content">
                    <div class="mission-content__left wow fadeInLeft" data-wow-delay=".5s">
                        <div class="mission-content__wrap">
                            <div class="mission-content__number">
                                1.
                            </div>
                            <div class="mission-content__text">
                                {!! $data->description_a !!}
                            </div>
                        </div>
                        <div class="mission-content__img">
                            <img src="{{ $data->photo_a }}" alt="mission">
                        </div>
                    </div>
                    <div class="mission-content__right wow fadeInRight" data-wow-delay=".5s">
                        <div class="mission-content__img">
                            <img src="{{ $data->photo_b }}" alt="mission">
                        </div>
                        <div class="mission-content__wrap">
                            <div class="mission-content__number">
                                2.
                            </div>
                            <div class="mission-content__text">
                                {!! $data->description_b !!}
                            </div>
                        </div>
                    </div>
                    <div class="mission-content__full">
                        <div class="mission-content__wrap wow fadeInLeft" data-wow-delay=".5s">
                            <div class="mission-content__number">
                                3.
                            </div>
                            <div class="mission-content__text">
                                {!! $data->description_c !!}
                            </div>
                        </div>
                        <div class="mission-content__img wow fadeInRight" data-wow-delay=".5s">
                            <img src="{{ $data->photo_c }}" alt="mission">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="vision">
            <div class="container">
                <h2 class="vision__title section__title">
                    {{ __('asd.Наше видение') }}
                </h2>
                <div class="vision-content">
                    <div class="vision-content__item">
                        <div class="vision-content__wrap wow fadeInLeft" data-wow-delay=".5s">
                            <h4 class="vision-content__title">
                                {{--{{ $data->header_a }}--}}
                            </h4>
                            <p class="vision-content__text">
                                {!! $data->description_d !!}
                            </p>&nbsp;
                            <img src="{{ $data->photo_d }}" alt="vision">
                        </div>
                        <div class="vision-content__img wow fadeInRight" data-wow-delay=".5s">
                            <img src="{{ $data->photo_e }}" alt="vision">
                        </div>
                    </div>
                    <div class="vision-content__item">
                        <div class="vision-content__wrap wow fadeInLeft" data-wow-delay=".5s">
                            <h4 class="vision-content__title">
                                {{ $data->header_b }}
                            </h4>
                            <p class="vision-content__text">
                                {!! $data->description_e !!}
                            </p>
                        </div>
                        <div class="vision-content__img wow fadeInRight" data-wow-delay=".5s">
                            <img src="{{ $data->photo_f }}" alt="vision">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('welcome.subscription')
    @endforeach
@endsection
