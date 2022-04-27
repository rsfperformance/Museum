<div class="family-single__side">
    <div class="family-single__side-title">
        {{ __('asd.Полезные ресурсы') }}
    </div>
    @foreach(App\Useful::where('lang', $lan)->take(8)->get()    as $data)
            @if($data->lang == $lan)
            <div class="sources-carousel__item">
                <img src="{{ $data->photo }}" alt="source">
                <a @if($data->type != 1 && $data->type != 7) href="/useful/{{ $data->one_id }}" @else href="{{ $data->link }}" @endif class="sources-carousel__link">
                    <div class="sources-carousel__info">
                        <span>{{ $data->created_at->format('M d Y') }} </span>
                        <span>
                            @if($data->type == 1) {{ __('asd.Монографии') }} @endif
                            @if($data->type == 2) {{ __('asd.Публикации') }} @endif
                            @if($data->type == 3) {{ __('asd.Научные статьи') }} @endif
                            @if($data->type == 4) {{ __('asd.Диссертации') }} @endif
                            @if($data->type == 5) {{ __('asd.Статьи в СМИ') }} @endif
                            @if($data->type == 6) {{ __('asd.Изречения, пословицы, поговорки') }}, {{ __('asd.стихи') }}  @endif
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
