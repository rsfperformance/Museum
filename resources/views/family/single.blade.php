@extends('welcome.full')

@section('content')
<section class="family-single">
    <div class="container">
        @foreach(App\Family::where('one_id', $item)->get() as $data)
        @if($data->lang == $lan)
        <div class="family-single__content">
            <h2 class="section__title family-single__title">
               {{ $data->header }}
            </h2>
            <img src="{{ $data->photo_a }}" alt="family" class="family-single__banner">
            <p class="family-single__text">
                {!! $data->description_a !!}
            </p><br>
            <div class="family-single__line"></div>
            <div class="family-single__wrap">
                <img src="{{ $data->photo_b }}" alt="img" class="wow fadeInLeft" data-wow-delay=".5s">
                <div class="wow fadeInRight" data-wow-delay=".5s">
                    {!! $data->description_b !!}
                </div>
            </div>
            <div class="family-single__wrap">
                <div class="wow fadeInLeft" data-wow-delay=".5s">
                    {!! $data->description_c !!}
                </div>
                <img src="{{ $data->photo_c }}" alt="img" class="wow fadeInRight" data-wow-delay=".5s">
            </div>

            {{--new start--}}
            @if($data->photo_b2 != null)
                <div class="family-single__wrap">
                    <img src="{{ $data->photo_b2 }}" alt="img" class="wow fadeInLeft" data-wow-delay=".5s">
                    <div class="wow fadeInRight" data-wow-delay=".5s">
                        {!! $data->description_b2 !!}
                    </div>
                </div>
            @endif
            @if($data->photo_c2 != null)
                <div class="family-single__wrap">
                    <div class="wow fadeInLeft" data-wow-delay=".5s">
                        {!! $data->description_c2 !!}
                    </div>
                    <img src="{{ $data->photo_c2 }}" alt="img" class="wow fadeInRight" data-wow-delay=".5s">
                </div>
            @endif
            {{--new end--}}

            <div class="family-single__line"></div>

            {{--new start--}}
            @if($data->photo_d != null)
                <img src="{{ $data->photo_d }}" alt="family" class="family-single__banner">
            @endif
                {{--new end--}}

            <p class="family-single__text">
                {!! $data->description_d !!}
            </p>
            <br>
          @if($data->link != '')
            <div class="family-single__video">
                <iframe src="{{ $data->link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
          @endif
        </div>
        @endif
        @endforeach
        
        @include('welcome.usefulbar')

    </div>	
</section>

<section class="history history-main-family">
    <div class="history-line">
        <span></span>
    </div>
    <div class="container">
        <div class="history-main">
            @foreach(App\History::where('lang', $lan)->get() as $data)
            <div class="history-carousel__item">
                <h3 class="history-carousel__title">
                   {{ $data->header }}
                </h3>
                <div class="history-carousel__dot">
                    <span></span>
                </div>
                <div class="history-carousel__img wow fadeInLeft" data-wow-delay=".3s">
                    <img src="{{ $data->photo_a }}" alt="history">
                    <a href="/history/{{ $data->one_id }}">Подробнее</a>
                </div>
            </div>
            
            @endforeach
        </div>
    </div>
</section>

@include('welcome.subscription')
@endsection
