@extends('admin.full')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <input class="form-control" type="hidden" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}" id="example-datetime-local-input">
                        <label for="" class="form-label">Дата:</label>
                        <input class="form-control" type="date" value="" id="example-datetime-local-input" name="date">
                    </div>
                    <div class="col-md-2">
                        <label for="" class="form-label">Время: От</label>
                        <input class="form-control" type="time" value="" id="example-datetime-local-input" name="firstime">
                    </div>
                    <div class="col-md-2">
                        <label for="" class="form-label">Время: До</label>
                        <input class="form-control" type="time" value="" id="example-datetime-local-input" name="secondtime">
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Что было сделано за сегодня?</label>
                        <input class="form-control" type="text" id="example-datetime-local-input" name="description">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">История</h4>

                <div class="table-responsive">
                    <table class="table table-striped mb-0">

                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Число</th>
                            <th>Что было сделано в этот день</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
