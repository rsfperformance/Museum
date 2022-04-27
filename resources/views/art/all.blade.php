@extends('welcome.full')

@section('content')
<section class="law">
    <div class="container">
        <h2 class="law__title section__title">
            {{ __('asd.Арт галерея') }}
        </h2>
        <div class="law-content">
            <div class="law__nav">
                <nav>
                    <a class="current" href="#">{{ __('asd.Декоративно-прикладное искусство') }}</a>
                    <a href="#">{{ __('asd.Скульптуры') }}</a>
                    <a href="#">{{ __('asd.Картины') }}</a>	
                </nav>
            </div>
            <div class="law-tabs">
                {{-- <div class="law-tab">
                    <div class="art-main__content">
                    @foreach(App\Art::where('one_id', 1)->get() as $data)
                    @if($lan == $data->lang)
                    
                    <div class="art-carousel__item">
                        <div class="art-carousel__img">
                            <img src="{{ $data->photo }}" alt="gallery" class="zoom-img">
                            <img src="/img/zoom.svg" alt="ico" class="zoom-open">
                        </div>
                        <div class="art-carousel__table">
                            {{ $data->header }}
                        </div>
                    </div>
                    
                    @endif
                    @endforeach
                    </div>
                    &nbsp
                    <div class="show-more">
                        <a href="#" class="btn">{{ __('asd.Показать еще') }}</a>
                    </div>
                </div> --}}

                @for($i=1; $i<=3; $i++)
                <div class="law-tab" @if($i==1) style="display: block;" @else style="display: none;" @endif >
                    <div class="art-main__content">
                    @foreach (App\Art::where('type', $i)->get() as $data)
                    @if($lan == $data->lang)
                    
                    <div class="art-carousel__item">
                        <div class="art-carousel__img">
                            <img src="{{ $data->photo }}" alt="gallery" class="zoom-img">
                            <img src="/img/zoom.svg" alt="ico" class="zoom-open">
                        </div>
                        <div class="art-carousel__table">
                            {{ $data->header }}
                        </div><br>
                    </div><br>
                   
                    @endif
                    @endforeach
                    </div>
                    &nbsp
                    {{--<div class="show-more">--}}
                        {{--<a href="#" class="btn">{{ __('asd.Показать еще') }}</a>--}}
                    {{--</div>--}}
                </div>
                @endfor

                {{-- <div class="law-tab">
                    <div class="art-main__content">
                    @foreach(App\Art::where('one_id', 3)->get() as $data)
                    @if($lan == $data->lang)
                    
                    <div class="art-carousel__item">
                        <div class="art-carousel__img">
                            <img src="{{ $data->photo }}" alt="gallery" class="zoom-img">
                            <img src="/img/zoom.svg" alt="ico" class="zoom-open">
                        </div>
                        <div class="art-carousel__table">
                            {{ $data->header }}
                        </div>
                    </div>
                   
                    @endif
                    @endforeach
                </div>
                &nbsp
                    <div class="show-more">
                        <a href="#" class="btn">{{ __('asd.Показать еще') }}</a>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</section>
@include('welcome.subscription')
@endsection