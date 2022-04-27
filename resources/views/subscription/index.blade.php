@extends('admin.full')

@section('content')
    <div class="col-xl-12">
        <div class="card">
            <h4 class="card-title"></h4>
            <p class="card-title-desc"></p>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-bordered mb-0">
                        <thead>
                        <tr>
                            <th style="text-align: center; width: 10px">#</th>
                            <th>Email</th>
                            <th style="text-align: center">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $k = 1 ?>
                        @foreach(App\Subscription::orderBy('id')->get() as $datum)
                            <tr>
                                <td>{{ $k }}</td>
                                <td>{{ $datum->mail }}</td>
                                <td style="text-align: center; display: flex; justify-content: center">
                                    <button style="margin-left: 10px" class="btn btn-danger"
                                            style="padding: 0px; height: 30px; width: 30px;" data-bs-toggle="modal"
                                            data-bs-target=".bs-example-modal-lg-delete{{ $datum->id }}"><i
                                            class="uil-trash"></i></button>
                                </td>
                            </tr>
                            <div class="modal fade bs-example-modal-lg-delete{{ $datum->id }}" tabindex="-1"
                                 role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content" style="text-align: center">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Удалить?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/subscription/{{ $datum->id }}" method="POST">
                                                @csrf
                                                {{ method_field('delete') }}
                                                <button style="margin-left: 10px" class="btn btn-danger"
                                                        style="padding: 0px; height: 30px; width: 30px;"><i
                                                        class="uil-trash"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $k++ ?>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
