@extends('welcome.full')

@section('content')
<section class="ceremony-main pattern">
    <div class="container">
        <h2 class="ceremony-main__title section__title">
            {{ __('asd.Семейный церемониал') }}
        </h2>
        <div class="ceremony-main__content">
            @foreach (App\Family::where('one_id', 1)->get() as $data)
                @if($data->lang == $lan)
                    <a href="/family/{{ $data->one_id }}" class="ceremony-carousel__item">
                        <h4 class="ceremony-carousel__title">
                            {{ $data->header }}
                        </h4>
                        <p class="ceremony-carousel__text">
                           {{ substr($data->description_a, 3, 150) }}...
                        </p>
                        <div class="ceremony-carousel__wrap">
                            <span>{{ $data->type_of_cerimony }}</span>
                            <span>{{ __('asd.Читать') }}</span>
                        </div>
                        <img src="{{ $data->photo_a }}" alt="ceremony">
                    </a>
                @endif
            @endforeach
                @foreach (App\Family::where('one_id', 3)->get() as $data)
                    @if($data->lang == $lan)
                        <a href="/family/{{ $data->one_id }}" class="ceremony-carousel__item">
                            <h4 class="ceremony-carousel__title">
                                {{ $data->header }}
                            </h4>
                            <p class="ceremony-carousel__text">
                                {{ substr($data->description_a, 3, 150) }}...
                            </p>
                            <div class="ceremony-carousel__wrap">
                                <span>{{ $data->type_of_cerimony }}</span>
                                <span>{{ __('asd.Читать') }}</span>
                            </div>
                            <img src="{{ $data->photo_a }}" alt="ceremony">
                        </a>
                    @endif
                @endforeach
                @foreach (App\Family::where('one_id', 2)->get() as $data)
                    @if($data->lang == $lan)
                        <a href="/family/{{ $data->one_id }}" class="ceremony-carousel__item">
                            <h4 class="ceremony-carousel__title">
                                {{ $data->header }}
                            </h4>
                            <p class="ceremony-carousel__text">
                                {{ substr($data->description_a, 3, 150) }}...
                            </p>
                            <div class="ceremony-carousel__wrap">
                                <span>{{ $data->type_of_cerimony }}</span>
                                <span>{{ __('asd.Читать') }}</span>
                            </div>
                            <img src="{{ $data->photo_a }}" alt="ceremony">
                        </a>
                    @endif
                @endforeach
        </div>

    </div>
</section>
@include('welcome.subscription')
@endsection
