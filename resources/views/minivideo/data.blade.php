@extends('admin.full')

@section('content')
<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Видео карусель</h4>
            <p class="card-title-desc"></p>
            <div class="tab-content p-3 text-muted">
                <form action="/minivideo" method="POST" enctype="multipart/form-data">
                    @csrf
                     <div class="col-12">
                        <input type="text" class="form-control" parsley-type="email" placeholder="Ссылка на видео" name="video"/>
                     </div>

                     <div class="text-center mt-4">
                         <button type="submit" class="btn btn-primary"> Сохранить </button>
                     </div>           
                </form>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Все ссылки</h4>
            <p class="card-title-desc"></p>
            <div class="tab-content p-3 text-muted">
                @foreach(App\Lang::all() as $data )
                <div class="tab-pane @if($data->prefix == 'en') active @endif" id="{{ $data->prefix }}" role="tabpanel"> 
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <table class="table table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Ссылка</th>
                                            <th>Действия</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $k=1 ?>
                                        @foreach(App\Minivideo::all() as $datum)
                                            <tr>
                                                <th>{{ $k }}</th>
                                                <td><a href="{{ $datum->video }}">{{ $datum->video }}</a></td>
                                                <td style="display: flex"> 
                                                    <button type="submit" class="btn btn-success" style="padding: 0px; height: 30px; width: 30px; margin-right: 5px" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center{{ $datum->id }}"><i class="uil-pen"></i></button>
                                                    <button class="btn btn-danger" style="padding: 0px; height: 30px; width: 30px;" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center-delete{{ $datum->id }}"><i class="uil-trash"></i></button>
                                                </td>
                                            </tr>
                                            <div class="modal fade bs-example-modal-center{{ $datum->id }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Изменить</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="/minivideo/{{ $datum->id }}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                {{ method_field('put') }}
                                                                <div class="col-12">
                                                                    <input type="text" class="form-control" parsley-type="email" placeholder="Ссылка на видео" name="video" value="{{ $datum->video }}"/>  
                                                                </div>
                                                                <div class="text-center mt-4">
                                                                    <button type="submit" class="btn btn-primary"> Изменить </button>
                                                                </div>             
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade bs-example-modal-center-delete{{ $datum->id }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Удалить?</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body" style="text-align: center">
                                                            <form action="/minivideo/{{ $datum->id }}" method="POST">
                                                                @csrf
                                                                {{ method_field('delete') }}
                                                                <button class="btn btn-danger" style="padding: 0px; height: 30px; width: 30px;"><i class="uil-trash"></i></button>
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
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection