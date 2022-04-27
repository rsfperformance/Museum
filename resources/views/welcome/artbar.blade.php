<div class="marry-single__side">
    <div class="family-single__side-title">
        {{ __('asd.Арт галерея') }}
    </div>
        @foreach(App\Art::all()->random(15) as $data)
            @if($data->lang == $lan)
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