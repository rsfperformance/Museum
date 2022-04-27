@extends('welcome.full')

@section('content')
<section class="family-single">
    <div class="container">
        @foreach(App\History::where('one_id', $one_id)->get() as $data)
        @if($data->lang == $lan)
        <div class="family-single__content">
            <h2 class="section__title family-single__title">
               {{ $data->header }}
            </h2>
            <img src="{{ $data->photo_a }}" alt="family" class="family-single__banner">
            <p class="family-single__text">
                {!! $data->description_a !!}
            </p>
            <div class="family-single__line"></div>
            <div class="family-single__wrap">
                <img src="{{ $data->photo_b }}" alt="img" class="wow fadeInLeft" data-wow-delay=".5s">

                    {!! $data->description_b !!}

            </div>
            <div class="family-single__wrap">

                    {!! $data->description_c !!}

                <img src="{{ $data->photo_c }}" alt="img" class="wow fadeInRight" data-wow-delay=".5s">
            </div>

            {{--/*new*/--}}
            @if($data->photo_b2 != null)
                <div class="family-single__wrap">
                    <img src="{{ $data->photo_b2 }}" alt="img" class="wow fadeInLeft" data-wow-delay=".5s">

                    {!! $data->description_b2 !!}

                </div>
            @endif
            @if($data->photo_c2 != null)
                <div class="family-single__wrap">

                    {!! $data->description_c2 !!}

                    <img src="{{ $data->photo_c2 }}" alt="img" class="wow fadeInRight" data-wow-delay=".5s">
                </div>
            @endif
            {{--/*new*/--}}

            <div class="family-single__line"></div>

            {{--new--}}
            @if($data->photo_d != null)
                <img src="{{ $data->photo_d }}" alt="family" class="family-single__banner">
            @endif
            {{--new--}}

            <p class="family-single__text">
                {!! $data->description_d !!}
            </p>&nbsp;
          @if($data->link != null)
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

@include('welcome.history')

@include('welcome.subscription')
@endsection
