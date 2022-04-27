@extends('admin.full')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Добавить язык</h4>
                    <form action="/lang" method="POST">
                        @csrf
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Язык</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" id="example-text-input" name="name">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Префикс</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" id="example-text-input" name="prefix">
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary w-md">Сохранить</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection