@extends('admin.full')

@section('content')

<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"></h4>
            <p class="card-title-desc"></p>
            <form action="/quote" method="POST" enctype="multipart/form-data">
                <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                    @foreach(App\Lang::all() as $data)
                    <li class="nav-item">
                        <a class="nav-link @if($data->prefix == 'en') active @endif" data-bs-toggle="tab" href="ui-tabs-accordions.html#modal{{ $data->prefix }}" role="tab">
                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                            <span class="d-none d-sm-block">{{ $data->name }}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>

                <!-- Tab panes -->
                <div class="tab-content p-3 text-muted">
                    @foreach(App\Lang::all() as $data )
                        <div class="tab-pane @if($data->prefix == 'en') active @endif" id="modal{{ $data->prefix }}" role="tabpanel"> 
                            <div class="row">
                                <div class="col-lg-12">                                 
                                    @csrf
                                    <div class="col-12">
                                        <input type="text" class="form-control" parsley-type="email" placeholder="Автор" name="author[{{ $data->prefix }}]"/>
                                    </div>
                                    &nbsp
                                    <div class="row">
                                        <div class="col-8">  
                                            <textarea class="form-control" rows="13" name="quote[{{ $data->prefix }}]"></textarea>
                                        </div>
                                        <div class="col-4" >
                                            <div action="form-uploads.html#" class="dropzone" style="height: 292px">
                                                <div class="dz-message needsclick">
                                                    <div class="mb-3">
                                                        <i class="display-4 text-muted uil uil-cloud-upload"></i>
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-lg-2" style="display: block">
                                                    <input type="file" class="form-control-file" name="photo{{ $data->prefix }}">
                                                </div>
                                            </div>
                                        </div>   
                                    </div>            
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary"> Сохранить </button>
                </div> 
            </form>
        </div>
    </div>
</div>

<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"></h4>
            <p class="card-title-desc"></p>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                @foreach(App\Lang::all() as $data)
                    <li class="nav-item">
                        <a class="nav-link @if($data->prefix == 'en') active @endif" data-bs-toggle="tab" href="ui-tabs-accordions.html#{{ $data->prefix }}" role="tab">
                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                            <span class="d-none d-sm-block">{{ $data->name }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
            <!-- Tab panes -->
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
                                                <th>Автор</th>
                                                <th>Цитата</th>
                                                <th>Действия</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $k=1 ?>
                                            @foreach(App\Quote::where('lang', $data->prefix)->get() as $datum)
                                                <tr>
                                                    <th>{{ $k }}</th>
                                                    <td>{{ $datum->author }}</td>
                                                    <td>{!! $datum->quote !!}</td>
                                                    <td style="display:flex"> 
                                                        <button class="btn btn-success" style="padding: 0px; height: 30px; width: 30px; margin-right: 5px" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center-create{{ $datum->id }}"><i class="uil-pen"></i></button>
                                                        
                                                        <button class="btn btn-danger" style="padding: 0px; height: 30px; width: 30px;" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center{{ $datum->id }}"><i class="uil-trash"></i></button>    
                                                    </td>
                                                </tr>
                                                <div class="modal fade bs-example-modal-center{{ $datum->id }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Удалить?</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                                </button>
                                                            </div>
                                                            <div class="modal-body" style="text-align: center">
                                                                <form action="/quote/{{ $datum->id }}" method="POST">
                                                                    @csrf
                                                                    {{ method_field('delete') }}
                                                                    <button class="btn btn-danger" style="padding: 0px; height: 30px; width: 30px;"><i class="uil-trash"></i></button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="modal fade bs-example-modal-center-create{{ $datum->id }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Изменить</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="/quote/{{ $datum->id }}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    {{ method_field('put') }}                                                             
                                                                    <div class="col-12">
                                                                        <div>
                                                                        <label class="col-md-2 col-form-label">Автор:</label>
                                                                            <input type="text" class="form-control" required
                                                                                    parsley-type="email" placeholder="Автор" name="author" value="{{ $datum->author }}"/>
                                                                        </div>
                                                                    </div>
                                                                    &nbsp
                                                                    <div class="col-12">  
                                                                    <div>
                                                                        <label class="col-md-2 col-form-label">Цитата:</label>
                                                                        <textarea class="form-control" rows="5" name="quote">{{ $datum->quote }}</textarea>
                                                                    </div>
                                                                    </div>
                                                                    &nbsp
                                                                    <div class="col-12">
                                                                        <div class="dropzone">
                                                                            <div class="dz-message needsclick">
                                                                                <div class="mb-3">
                                                                                    <img src="{{ $datum->photo }}" alt="">
                                                                                </div>
                                                                            </div>
                                                                            <div class="mb-3 col-lg-2" style="display: block">
                                                                            <input type="file" class="form-control-file" name="photo" value="{{ $datum->photo }}">
                                                                        </div>
                                                                    </div> <!-- end col -->
                                                                    &nbsp
                                                                    <div class="text-center mt-4">
                                                                        <button type="submit" class="btn btn-primary"> Изменить </button>
                                                                    </div>           
                                                                </form>
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
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
