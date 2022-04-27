@extends('admin.full')

@section('content')
<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
 				
            <h4 class="card-title">Законодательство о семье.@if(isset($item->type)) @if(isset($item->type) && $item->type == 1) Республика Узбекистан @endif @if(isset($item->type) && $item->type == 2) Туркестан @endif @if(isset($item->type) && $item->type == 3) CCCР @endif @else
          		@if(isset($item) && $item == 1) Республика Узбекистан @endif @if(isset($item) && $item == 2) Туркестан  @endif @if(isset($item) && $item == 3) CCCР @endif
              @endif
          	</h4>
            <p class="card-title-desc"></p>

            <form action="/information" method="POST" enctype="multipart/form-data">
                @csrf
                <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                    @foreach(App\Lang::all() as $data)
                    <li class="nav-item">
                        <a class="nav-link @if($data->prefix == 'en') active @endif" data-bs-toggle="tab" href="#modal{{ $data->prefix }}" role="tab">
                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                            <span class="d-none d-sm-block">{{ $data->name }}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>

                <div class="tab-content p-3 text-muted">
                    @foreach(App\Lang::all() as $data)
                    <div class="tab-pane @if($data->prefix == 'en') active @endif" id="modal{{ $data->prefix }}" role="tabpanel"> 
                        <div class="row">
                            <div class="col-lg-12">                               
                                <div class="col-12">
                                    <input type="text" class="form-control" parsley-type="email" placeholder="Заголовок" name="header[{{ $data->prefix }}]"/>
                                </div>             
                            </div>
                        </div>
                    </div>
                    @endforeach
                    &nbsp;
                        <div class="col-12">
                            <div action="form-uploads.html#" class="dropzone">
                                <div class="dz-message needsclick">
                                    <div class="mb-3">
                                        <i class="display-4 text-muted uil uil-cloud-upload"></i>
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-2" style="display: block">
                                    <input type="file" class="form-control-file" name="file">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" @if(isset($item->type)) value="{{ $item->type }}" @else value="{{ $item }}" @endif name="type">
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary"> Сохранить </button>
                        </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
			
            <h4 class="card-title">
              @if(isset($item->type))
              	@if(isset($item->type) && $item->type == 1) Республика Узбекистан @endif @if(isset($item->type) && $item->type == 2) Туркестан  @endif @if(isset($item->type) && $item->type == 3) CCCР @endif
              @else
              	@if(isset($item) && $item == 1) Республика Узбекистан @endif @if(isset($item) && $item == 2) Туркестан  @endif @if(isset($item) && $item == 3) CCCР @endif
              @endif
          </h4>

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
                                                    <th>Название</th>
                                                    <th>Файл</th>
                                                    <th>Действия</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $k=1 ?>
                                            @if(isset($item->type))
                                            @foreach(App\Information::where('type', $item->type)->get() as $datum)
                                            
                                                @if($datum->lang == $data->prefix)
                                                
                                                <tr>
                                                    <th>{{ $k }}</th>
                                                    <td>{{ $datum->header }}</td>
                                                    <td style="text-align: center"><a href="{{ $datum->file }}"><button class="btn btn-outline-info" style="padding: 0px; height: 30px; width: 30px;"><i class="uil-eye"></i></button></a>@if($datum->file == null) Пусто @endif </td>
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
                                                                <form action="/information/{{ $datum->id }}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    {{ method_field('put') }}
                                                                    
                                                                     <div class="col-12">
                                                                         <div>
                                                                            <label class="col-md-2 col-form-label">Заголовок:</label>
                                                                             <input type="text" class="form-control" required
                                                                                     parsley-type="email" placeholder="Заголовок" name="header" value="{{ $datum->header }}"/>
                                                                         </div>
                                                                     </div>
                                                                     <input type="hidden" value="{{ $datum->type }}" name="type">
                                                                     <input type="hidden" value="{{ $datum->one_id }}" name="one_id">
                                                                     &nbsp
                                                                         <div class="col-12">
                                                                                     <div>
                                                                                         <div class="dropzone">
                                                                                             <div class="dz-message needsclick">
                                                                                                 <div class="mb-3">
                                                                                                     <i class="display-4 text-muted uil uil-cloud-upload"></i>
                                                                                                 </div>
                                                                                             </div>
                                                                                             <div class="mb-3 col-lg-2" style="display: block">
                                                                                                <input type="file" class="form-control-file" name="file" value="file">
                                                                                            </div>
                                                                                         </div>
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
                                                <div class="modal fade bs-example-modal-center-delete{{ $datum->id }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content" style="text-align: center">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Удалить?</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                
                                                                <form action="/information/{{ $datum->id }}" method="POST">
                                                                    @csrf
                                                                    {{ method_field('delete') }}
                                                                    <button class="btn btn-danger" style="padding: 0px; height: 30px; width: 30px;" type="submit"><i class="uil-trash"></i></button>
                                                                </form>
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div>
                                                <?php $k++ ?>
                                                @endif
                                            @endforeach
                                            @endif
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
