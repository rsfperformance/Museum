@extends('admin.full')

@section('content')

<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Арт галерея</h4>
            <h4 class="card-title">
                @if($type == 1) - Декоративно-прикладное искусство @endif
                @if($type == 2) - Скульптуры @endif
                @if($type == 3) - Картины @endif
            </h4>
            <p class="card-title-desc"></p>

            <form action="/arts" method="POST" enctype="multipart/form-data">
                @csrf
                    <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                        @foreach(App\Lang::orderBy('id')->get() as $data)
                        <li class="nav-item">
                            <a class="nav-link @if($data->prefix == 'en') active @endif" data-bs-toggle="tab" href="#main{{ $data->prefix }}" role="tab">
                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                <span class="d-none d-sm-block">
                                    {{ $data->name }}
                                </span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    <div class="tab-content p-3 text-muted">
                        @foreach(App\Lang::orderBy('id')->get() as $data)
                            <div class="tab-pane @if($data->prefix == 'en') active @endif" id="main{{ $data->prefix }}" role="tabpanel"> 
                                <div class="row">
                                    <div class="col-lg-12">
                                        <input type="text" class="form-control" parsley-type="email" placeholder="Описание" name="header[{{ $data->prefix }}]"/>
                                        <input type="hidden" value="{{ $data->prefix }}" name="lang">      
                                    </div>                   
                                </div>
                            </div>
                        @endforeach
                    </div>                
                    <div class="row">
                        <div class="col-12">
                            <div action="form-uploads.html#" class="dropzone">
                                <div class="dz-message needsclick">
                                    <div class="mb-3">
                                        <img src="" alt="" style="height: 200px; width: 250px;">
                                    </div>
                                </div>
                                <input name="photo" type="file" value="">
                            </div>  
                            <input type="hidden" value="{{ $type }}" name="type">  
                            &nbsp
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary"> Добавить </button>
                            </div> 
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>
<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <p class="card-title-desc"></p>
            <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                @foreach(App\Lang::orderBy('id')->get() as $data)
                <li class="nav-item">
                    <a class="nav-link @if($data->prefix == 'en') active @endif" data-bs-toggle="tab" href="ui-tabs-accordions.html#{{ $data->prefix }}" role="tab">
                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                        <span class="d-none d-sm-block">
                            {{ $data->name }}
                        </span>
                    </a>
                </li>
                @endforeach
            </ul>
            <div class="tab-content p-3 text-muted">
                @foreach(App\Lang::orderBy('id')->get() as $data)
                    <div class="tab-pane @if($data->prefix == 'en') active @endif" id="{{ $data->prefix }}" role="tabpanel"> 
                        <div class="row">
                            <div class="col-lg-12">                        
                                &nbsp
                                <table class="table table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Фото</th>
                                            <th>Описание</th>
                                            <th>Действия</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $k=1 ?>
                                            @foreach(App\Art::where('lang', $data->prefix)->get() as $datum)
                                                @if($datum->type == $type)
                                                    <tr>
                                                        <th>{{ $k }}</th>
                                                        <td><img src="{{ $datum->photo }}" alt="" style="height: 100px; width: 100px"> </td>
                                                        <td>{{ $datum->header }}</td>
                                                        <td style="display: flex"> 
                                                        <button type="submit" class="btn btn-success" style="padding: 0px; height: 30px; width: 30px; margin-right: 5px" data-bs-toggle="modal" data-bs-target=".bs-example-modal-xl{{ $datum->id }}"><i class="uil-pen"></i></button>
                                                            
                                                        <button class="btn btn-danger" style="padding: 0px; height: 30px; width: 30px;" data-bs-toggle="modal" data-bs-target=".bs-example-modal-xl-delete{{ $datum->id }}"><i class="uil-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                    <div class="modal fade bs-example-modal-xl{{ $datum->id }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-xl">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Изменить</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="/arts/{{ $datum->id }}" method="POST" enctype="multipart/form-data">
                                                                        @csrf
                                                                        {{ method_field('put') }}
                                                                        <div class="row">
                                                                            {{-- 1 --}}
                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <div class="col-12">
                                                                                        <div>
                                                                                            <div action="form-uploads.html#" class="dropzone">
                                                                                                <div class="dz-message needsclick">
                                                                                                    <div class="mb-3">
                                                                                                        <img src="{{ $datum->photo }}" alt="" style="height: 200px; width: 250px;">
                                                                                                    </div>
                                                                                                    
                                                                                                </div>
                                                                                                    <input name="photo" type="file" value="{{ $datum->photo }}">
                                                                                            </div>
                                                                                        </div>
                                                                                        &nbsp
                                                                                        <input type="text" class="form-control" required
                                                                                            parsley-type="email" placeholder="Описание" name="header" value="{{ $datum->header }}"/>
                                                                                    </div>
                                                                                </div>
                                                                                </div>
                                                                                <input type="hidden" value="{{ $datum->type }}" name="type">
                                                                                <input type="hidden" value="{{ $datum->one_id }}" name="one_id">
                                                                                <input type="hidden" value="{{ $data->prefix }}" name="lang">
                                                                        </div>
                                                                            <div class="text-center mt-4">
                                                                                <button type="submit" class="btn btn-primary"> Изменить </button>
                                                                            </div>           
                                                                    </form>
                                                                </div>             
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div>
                                                    <div class="modal fade bs-example-modal-xl-delete{{ $datum->id }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-xl">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Удалить?</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body" style="text-align: center">
                                                                    <form action="/arts/{{ $datum->id }}" method="POST">
                                                                        @csrf
                                                                        {{ method_field('delete') }}  
                                                                        <button class="btn btn-danger" style="padding: 0px; height: 30px; width: 30px;"><i class="uil-trash"></i></button>
                                                                    </form>
                                                                </div>             
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div>
                                                    <?php $k++ ?>
                                                @endif
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
