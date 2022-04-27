@extends('welcome.full')

@section('content')
<section class="sources-main pattern">
    <div class="container">
        <h2 class="law__title section__title">
            {{ __('asd.Полезные ресурсы') }}
        </h2>
        <div class="law-content">
            <div class="law__nav">
                <nav>
					<a href="#" @if($type==1) class="current" @endif>{{ __('asd.Монографии') }}</a>
                    {{--<a href="#" @if($type==2) class="current" @endif>{{ __('asd.Публикации') }}</a>--}}
                    <a href="#" @if($type==3) class="current" @endif>{{ __('asd.Научные статьи') }}</a>
                    <a href="#" @if($type==4) class="current" @endif>{{ __('asd.Диссертации') }}</a>	
					<a href="#" @if($type==5) class="current" @endif>{{ __('asd.Статьи в СМИ') }}</a>
					<a href="#" @if($type==6) class="current" @endif>{!! __('asd.Изречения, пословицы, поговорки, стихи') !!}</a>
                    {{--<a href="#" @if($type==7) class="current" @endif>{!! __('asd.Полезные ссылки') !!}</a>--}}
                </nav>
            </div>
            <div class="law-tabs">
				@for($i=1; $i<=7; $i++)
                    @if($i!=2 && $i!=7)
                        <div class="law-tab" @if($i == $type) style="display: block" @else style="display:none" @endif>
                            <div class="sources-main__content">
                                @foreach(App\Useful::where('type', $i)->get() as $data)
                                    @if($lan == $data->lang)
                                        @if($i != 1 && $i != 7 && $i != 5 && $i != 3)
                                            <div class="sources-main__item">
                                                <div class="sources-main__img">
                                                    <img src="{{ $data->photo }}" alt="img">
                                                </div>
                                                <div class="sources-main__wrap">
                                                    <div class="sources-main__date">
                                                        {{ $data->created_at->format('M d Y') }}
                                                    </div>
                                                    <div class="sources-main__name">
                                                        {{ $data->header }}
                                                    </div>
                                                    <a  href="/useful/{{ $data->one_id }}" class="sources-main__link">
                                                        {{ __('asd.Подробнее') }}
                                                        <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M2.70768 7.04134H9.13185L7.1656 9.40301C7.12007 9.45778 7.08578 9.52098 7.06468 9.58901C7.04358 9.65703 7.03609 9.72855 7.04263 9.79947C7.05583 9.9427 7.1254 10.0748 7.23601 10.1668C7.34663 10.2587 7.48924 10.3029 7.63247 10.2897C7.7757 10.2765 7.90782 10.207 7.99977 10.0963L10.7081 6.84634C10.7263 6.82049 10.7426 6.79334 10.7568 6.76509C10.7568 6.73801 10.7839 6.72176 10.7948 6.69468C10.8193 6.63257 10.8322 6.56646 10.8327 6.49968C10.8322 6.43289 10.8193 6.36678 10.7948 6.30468C10.7948 6.27759 10.7677 6.26134 10.7568 6.23426C10.7426 6.20602 10.7263 6.17886 10.7081 6.15301L7.99977 2.90301C7.94884 2.84186 7.88506 2.79269 7.81297 2.75899C7.74089 2.72529 7.66226 2.70788 7.58268 2.70801C7.45612 2.70776 7.33347 2.75184 7.23601 2.83259C7.18117 2.87806 7.13583 2.93391 7.1026 2.99693C7.06936 3.05995 7.04889 3.12891 7.04235 3.19986C7.03581 3.2708 7.04333 3.34234 7.06448 3.41038C7.08563 3.47841 7.11999 3.54161 7.1656 3.59634L9.13185 5.95801H2.70768C2.56402 5.95801 2.42625 6.01508 2.32467 6.11666C2.22308 6.21824 2.16602 6.35602 2.16602 6.49968C2.16602 6.64334 2.22308 6.78111 2.32467 6.88269C2.42625 6.98427 2.56402 7.04134 2.70768 7.04134Z" fill="#21234A"/>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        @endif
                                        @if($i == 1 && $i == $type)
                                            <div class="sources-mono__item">
                                                <div class="sources-mono__img">
                                                    <img src="{{ $data->photo }}" alt="img">
                                                </div>
                                                <div class="sources-mono__wrap">
                                                    <div class="sources-mono__name">
                                                        {{ $data->header }}
                                                    </div>
                                                    <div class="sources-mono__text">
                                                        {!! $data->description !!}
                                                    </div>
                                                    <a href="{{ $data->link }}" class="sources-mono__link">
                                                        {{ $data->link }}
                                                    </a>
                                                </div>
                                            </div>
                                        @endif
                                        @if($i == 1 && $i != $type)
                                            <div class="sources-mono__item">
                                                <div class="sources-mono__img">
                                                    <img src="{{ $data->photo }}" alt="img">
                                                </div>
                                                <div class="sources-mono__wrap">
                                                    <div class="sources-mono__name">
                                                        {{ $data->header }}
                                                    </div>
                                                    <div class="sources-mono__text">
                                                        {!! $data->description !!}
                                                    </div>
                                                    <a href="{{ $data->link }}" class="sources-mono__link">
                                                        {{ $data->link }}
                                                    </a>
                                                </div>
                                            </div>
                                        @endif

                                        @if($i == 3 && $i == $type)
                                            <div class="sources-mono__item">
                                                <div class="sources-mono__img">
                                                    <img src="{{ $data->photo }}" alt="img">
                                                </div>
                                                <div class="sources-mono__wrap">
                                                    <div class="sources-mono__name">
                                                        {{ $data->header }}
                                                    </div>
                                                    <div class="sources-mono__text">
                                                        {!! $data->description !!}
                                                    </div>
                                                    <a href="{{ $data->link }}" class="sources-mono__link">
                                                        {{ $data->link }}
                                                    </a>
                                                </div>
                                            </div>
                                        @endif
                                        @if($i == 3 && $i != $type)
                                            <div class="sources-mono__item">
                                                <div class="sources-mono__img">
                                                    <img src="{{ $data->photo }}" alt="img">
                                                </div>
                                                <div class="sources-mono__wrap">
                                                    <div class="sources-mono__name">
                                                        {{ $data->header }}
                                                    </div>
                                                    <div class="sources-mono__text">
                                                        {!! $data->description !!}
                                                    </div>
                                                    <a href="{{ $data->link }}" class="sources-mono__link">
                                                        {{ $data->link }}
                                                    </a>
                                                </div>
                                            </div>
                                        @endif

                                        @if($i == 5 && $i == $type)
                                            <div class="sources-mono__item">
                                                <div class="sources-mono__img">
                                                    <img src="{{ $data->photo }}" alt="img">
                                                </div>
                                                <div class="sources-mono__wrap">
                                                    <div class="sources-mono__name">
                                                        {{ $data->header }}
                                                    </div>
                                                    <div class="sources-mono__text">
                                                        {!! $data->description !!}
                                                    </div>
                                                    <a href="{{ $data->link }}" class="sources-mono__link">
                                                        {{ $data->link }}
                                                    </a>
                                                </div>
                                            </div>
                                        @endif
                                        @if($i == 5 && $i != $type)
                                            <div class="sources-mono__item">
                                                <div class="sources-mono__img">
                                                    <img src="{{ $data->photo }}" alt="img">
                                                </div>
                                                <div class="sources-mono__wrap">
                                                    <div class="sources-mono__name">
                                                        {{ $data->header }}
                                                    </div>
                                                    {{--<div class="sources-mono__text">--}}
                                                        {{--{!! $data->description !!}--}}
                                                    {{--</div>--}}
                                                    <a href="{{ $data->link }}" class="sources-mono__link">
                                                        {{ $data->link }}
                                                    </a>
                                                </div>
                                            </div>
                                        @endif

                                        @if($i == 7 && $i == $type)
                                            <div class="sources-mono__item">
                                                <div class="sources-mono__img">
                                                    <img src="{{ $data->photo }}" alt="img">
                                                </div>
                                                <div class="sources-mono__wrap">
                                                    <div class="sources-mono__name">
                                                        {{ $data->header }}
                                                    </div>
                                                    {{--<div class="sources-mono__text">--}}
                                                        {{--{!! $data->description !!}--}}
                                                    {{--</div>--}}
                                                    <a href="{{ $data->link }}" class="sources-mono__link">
                                                        {{ $data->link }}
                                                    </a>
                                                </div>
                                            </div>
                                        @endif
                                        @if($i == 7 && $i != $type)
                                            <div class="sources-mono__item">
                                                <div class="sources-mono__img">
                                                    <img src="{{ $data->photo }}" alt="img">
                                                </div>
                                                <div class="sources-mono__wrap">
                                                    <div class="sources-mono__name">
                                                        {{ $data->header }}
                                                    </div>
                                                    <div class="sources-mono__text">
                                                        {!! $data->description !!}
                                                    </div>
                                                    <a href="{{ $data->link }}" class="sources-mono__link">
                                                        {{ $data->link }}
                                                    </a>
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
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
