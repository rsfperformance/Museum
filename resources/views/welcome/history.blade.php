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
                    <a href="/history/{{ $data->one_id }}">{{ __('asd.Подробнее') }}</a>
                </div>
            </div>
            
            @endforeach
        </div>
    </div>
</section>