@extends('admin.full')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Музей узбекской семьи. Админ панель</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{--{{ $_COOKIE["XSRF-TOKEN"] }}--}}

                   Вы успешно вошли в систему!
                        <?php
                            session()->push('preloader', $_SERVER['REMOTE_ADDR']);
                            $preloader = session()->get('preloader');
                            //dd(isset($_SERVER['REMOTE_ADDR'], $preloader));
                        ?>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
