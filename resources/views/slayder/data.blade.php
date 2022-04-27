@extends('admin.full')

@section('content')
<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Слайдер</h4>
            <p class="card-title-desc"></p>
            <div class="tab-content p-3 text-muted">
                {{-- @foreach(App\Lang::all() as $data ) --}}
                <form action="/slayder" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-12">  
                        <div class="dropzone">
                            <div class="dropzone dz-clickable"> 
                                <div class="dz-message needsclick">
                                    <div class="mb-3">
                                        <i class="display-4 text-muted uil uil-cloud-upload"></i>
                                    </div>
                                    <h4>Загрузить фото</h4>
                                </div>
                                <div class="mb-3 col-lg-2" style="display: block">
                                    <input type="file" class="form-control-file" name="photo" value="">
                                </div>
                            </div>
                        </div>                                 
                    </div>
                    &nbsp
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
            <h4 class="card-title"></h4>
            <p class="card-title-desc"></p>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th style="text-align: center">Фото</th>
                                    <th>Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $k=1 ?>
                                @foreach(App\Slayder::orderBy('id')->get() as $datum)                    
                                    <tr>
                                        <td style="text-align: center; justify-content: center; paddding:0px"><img src="{{ $datum->photo }}" alt="" style="height: 400px; width: 600px"></td>
                                        <td style="text-align: center; display: flex; justify-content: center">
                                            <button style="margin-right: 10px" type="submit" class="btn btn-success" style="padding: 0px; height: 30px; width: 30px;" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg{{ $datum->id }}"><i class="uil-pen"></i></button>
                                            <button style="margin-left: 10px" class="btn btn-danger" style="padding: 0px; height: 30px; width: 30px;" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg-delete{{ $datum->id }}"><i class="uil-trash"></i></button>
                                        </td>
                                    </tr>
                                    <div class="modal fade bs-example-modal-lg{{ $datum->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Изменить</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="/slayder/{{ $datum->id }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    {{ method_field('put') }}
                                                        <div class="col-12">
                                                            <div class="dropzone">
                                                                <div class="dz-message needsclick">
                                                                    <div class="mb-3">
                                                                        <img src="{{ $datum->photo }}" alt="" style="height: 300px; width:500px">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3 col-lg-2" style="display: block;">
                                                                    <input type="file" class="form-control-file" name="photo" value="{{ $datum->photo }}">
                                                                </div>
                                                            </div>              
                                                        </div> 
                                                        &nbsp
                                                        <div class="text-center mt-4">
                                                            <button type="submit" class="btn btn-primary"> Изменить </button>
                                                        </div>           
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade bs-example-modal-lg-delete{{ $datum->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content" style="text-align: center">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Удалить?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="/slayder/{{ $datum->id }}" method="POST">
                                                        @csrf
                                                        {{ method_field('delete') }}
                                                        <button style="margin-left: 10px" class="btn btn-danger" style="padding: 0px; height: 30px; width: 30px;"><i class="uil-trash"></i></button>
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
    </div>
</div>
@endsection