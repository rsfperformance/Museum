@extends('welcome.full')

@section('content')
<section class="marry-single">
    <div class="container">
        @foreach (App\Familyform::where('one_id', $one_id)->get() as $data)
        @if($data->lang == $lan)
        <div class="family-single__content">
            <h2 class="section__title family-single__title">
                {{ __('asd.Формы семьи') }}
            </h2>
            <img src="{{ $data->photo }}" alt="family" class="family-single__banner">
            <div class="publish-text">
                <p>{!! $data->description !!}</p>
            </div>
            <div class="family-single__video">
                <iframe src="{{ $data->link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
        @endif
        @endforeach
        <div class="marry-single__side">
            <div class="family-single__side-title">
                {{ __('asd.Другие публикации') }}
            </div>
            @foreach(App\Familyform::where('lang', $lan)->get() as $data)
            <div class="sources-main__item">
                <div class="sources-main__img">
                    <img src="{{ $data->photo }}" alt="img">
                </div>
                <div class="sources-main__wrap">
                    <div class="sources-main__category">
                        
                    </div>
                    <div class="sources-main__name">
                        {{ $data->header }}
                    </div>
                    <a href="/familyform/{{ $data->one_id }}" class="sources-main__link">
                         {{ __('asd.Подробнее') }}
                        <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.70768 7.04134H9.13185L7.1656 9.40301C7.12007 9.45778 7.08578 9.52098 7.06468 9.58901C7.04358 9.65703 7.03609 9.72855 7.04263 9.79947C7.05583 9.9427 7.1254 10.0748 7.23601 10.1668C7.34663 10.2587 7.48924 10.3029 7.63247 10.2897C7.7757 10.2765 7.90782 10.207 7.99977 10.0963L10.7081 6.84634C10.7263 6.82049 10.7426 6.79334 10.7568 6.76509C10.7568 6.73801 10.7839 6.72176 10.7948 6.69468C10.8193 6.63257 10.8322 6.56646 10.8327 6.49968C10.8322 6.43289 10.8193 6.36678 10.7948 6.30468C10.7948 6.27759 10.7677 6.26134 10.7568 6.23426C10.7426 6.20602 10.7263 6.17886 10.7081 6.15301L7.99977 2.90301C7.94884 2.84186 7.88506 2.79269 7.81297 2.75899C7.74089 2.72529 7.66226 2.70788 7.58268 2.70801C7.45612 2.70776 7.33347 2.75184 7.23601 2.83259C7.18117 2.87806 7.13583 2.93391 7.1026 2.99693C7.06936 3.05995 7.04889 3.12891 7.04235 3.19986C7.03581 3.2708 7.04333 3.34234 7.06448 3.41038C7.08563 3.47841 7.11999 3.54161 7.1656 3.59634L9.13185 5.95801H2.70768C2.56402 5.95801 2.42625 6.01508 2.32467 6.11666C2.22308 6.21824 2.16602 6.35602 2.16602 6.49968C2.16602 6.64334 2.22308 6.78111 2.32467 6.88269C2.42625 6.98427 2.56402 7.04134 2.70768 7.04134Z" fill="#21234A"/>
                        </svg>	
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>	
</section>

@include('welcome.subscription')
@endsection