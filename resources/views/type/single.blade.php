@extends('welcome.full')

@section('content')
<section class="marry-single">
    <div class="container">
        <div class="family-single__content">
            <h2 class="section__title family-single__title">
                 {{ __('asd.Типы брака') }}
            </h2>
            @foreach(App\Type::where('one_id', $one_id)->get() as $data)
            @if($data->lang == $lan)
            <img src="{{ $data->photo_a }}" alt="family" class="family-single__banner">
            
            <p class="family-single__text">
                {!! $data->description_a !!}
            </p>&nbsp;
                @if($one_id != 2 && $one_id != 3)
                    <div class="marry-single__images">
                        <img src="{{ $data->photo_b }}" alt="img" class="wow fadeInLeft" data-wow-delay=".5s">
                        <img src="{{ $data->photo_c }}" alt="img" class="wow fadeInRight" data-wow-delay=".5s">
                    </div>
                @endif
            <div class="family-single__line"></div>
                @if($data->description_b != '')
                    <p class="family-single__text">
                        {!! $data->description_b !!}
                    </p>&nbsp;
                @endif
            <div class="marry-single__quote">
                {!! $data->quote !!}
            </div>
          @if($data->link != null)
            <div class="family-single__video">
                <iframe src="{{ $data->link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
          @endif
            @endif
            @endforeach
        </div>
        @include('welcome.artbar')
    </div>	
</section>
<section class="marry-single-after">
    <div class="container">
        <div class="marry-main wow fadeInUp" data-wow-delay=".5s">
            @foreach(App\Type::where('lang', $lan)->get() as $data)
            <a href="/type/{{ $data->one_id }}" class="marry-item">
                <img src="{{ $data->photo_a }}" alt="marriage">
                <div class="marry-item__letter">
                    @if($data->one_id == 1 && $data->lang == 'en') P @endif
                    @if($data->one_id == 2 && $data->lang == 'en') L @endif
                    @if($data->one_id == 3 && $data->lang == 'en') S @endif
                    @if($data->one_id == 4 && $data->lang == 'en') P @endif
                    @if($data->one_id == 5 && $data->lang == 'en') C @endif
                    @if($data->one_id == 6 && $data->lang == 'en') C @endif
                    @if($data->one_id == 7 && $data->lang == 'en') R @endif
                    @if($data->one_id == 8 && $data->lang == 'en') K @endif
                    @if($data->one_id == 9 && $data->lang == 'en') L @endif
                </div>
                <h4 class="marry-item__name">
                    {{ $data->header }}
                </h4>
            </a>
            @endforeach
        </div>  
    </div>
</section>

@include('welcome.subscription')

@endsection
