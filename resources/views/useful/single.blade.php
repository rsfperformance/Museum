@extends('welcome.full')

@section('content')
<section class="marry-single">
    <div class="container">

        @foreach(App\Useful::where('one_id', $item[$lan]->one_id)->get() as $data)
        @if($data->lang == $lan)
        <div class="family-single__content">
            <h2 class="section__title family-single__title">
            {{ __('asd.Публикации') }}
            </h2>
            <img src="{{ $data->photo }}" alt="family" class="family-single__banner">
            <div class="publish-text">
                <p>
                    {{ $data->header }}
                </p>
                <p>
                    {!! $data->description !!}
                </p>
            </div>
        </div>
        @endif
        @endforeach

        @include('welcome.usefulbar')
    </div>	
</section>

@include('welcome.subscription')
@endsection