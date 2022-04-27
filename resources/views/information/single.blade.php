@extends('welcome.full')

@section('content')
<section class="law">
    <div class="container">
        <h2 class="law__title section__title">
             {{ __('asd.Законодательство о семье') }}
        </h2>
        <div class="law-content">
            <div class="law__nav">
                <nav>
                    <a href="#" @if($type == 3) class="current" @endif>{{ __('asd.СССР / Узбекская ССР') }}</a>
                    <a href="#" @if($type == 1) class="current" @endif>{{ __('asd.Республика Узбекистан') }}</a>
                    {{--<a href="#" @if($type == 2) class="current" @endif>{{ __('asd.Туркестан') }}</a>--}}

                </nav>
            </div>
            <div class="law-tabs">
                @for($i=3; $i>=1; $i--)
                    @if($i != 2)
                        <div class="law-tab" @if($i == $type) style="display: block" @else style="display: none" @endif>
                            @foreach(App\Information::where('type', $i)->get() as $data)
                                @if($lan == $data->lang)
                                    <div class="law-tab__item">
                                        <div class="law-tab__name">
                                           {{ $data->header }}
                                            <i class="fa fa-chevron-down"></i>
                                        </div>
                                        <div class="law-tab__content">
                                            <div class="law-tab__doc">
                                                <span>
                                                    <img src="/img/file.svg" alt="ico">
                                                    {{ $data->header }}.pdf
                                                </span>
                                                <span>
                                                    <a href="{{ $data->file }}" download><img src="/img/doc.svg" alt="ico"></a>
                                                    <a href="{{ $data->file }}"><img src="/img/eye.svg" alt="ico"></a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            {{--<div class="show-more">--}}
                                {{--<a href="#" class="btn">{{ __('asd.Показать еще') }}</a>--}}
                            {{--</div>--}}
                        </div>
                    @endif
                @endfor
            </div>
        </div>
    </div>
</section>
@include('welcome.subscription')
@endsection
