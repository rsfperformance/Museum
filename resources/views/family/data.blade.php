@extends('admin.full')

@section('content')
    <style>
        .cke_reset {
            min-height: 280px;
        }
    </style>
<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Семейный церимониал</h4>
            <p class="card-title-desc"></p>
        <form action="/family" method="POST" enctype="multipart/form-data">
            @csrf
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
                @foreach(App\Lang::all() as $data)
                <div class="tab-pane @if($data->prefix == 'en') active @endif" id="{{ $data->prefix }}" role="tabpanel">
                         <div class="row">
                             <div class="col-6">
                                 <div>
                                     <input type="text" class="form-control"
                                            parsley-type="email" placeholder="Заголовок" name="header[{{ $data->prefix }}]"/>
                                 </div>
                             </div>
                             <div class="col-6">
                                 <div>
                                     <input type="text" class="form-control"
                                            parsley-type="email" placeholder="Тип церимонии" name="type_of_cerimony[{{ $data->prefix }}]"/>
                                 </div>
                             </div>
                         </div>
                         <input type="hidden" value="" name="lang">
                         &nbsp
                        <div class="col-12">
                            <div>
                                <div class="dropzone">
                                    <div class="dz-message needsclick">
                                        <div class="mb-3">
                                            <img src="" alt="" style="height: 200px; width: 200px;">
                                        </div>
                                    </div>
                                    @if($data->prefix == 'en')
                                        <div class="mb-3 col-lg-2" style="display: block">
                                            <input type="file" class="form-control-file" name="photo_a{{ $data->prefix }}">
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div> <!-- end col -->
                         &nbsp
                         <div class="col-12">
                            <textarea id="my-editor1{{ $data->prefix }}" name="description_a[{{ $data->prefix }}]" class="form-control"></textarea>  
                         </div>
                         &nbsp           
                         <div class="row">
                             <div class="col-6">
                                <div>
                                    <div class="dropzone">
                                        <div class="dz-message needsclick">
                                            <div class="mb-3">
                                                <img src="" alt="" style="height: 200px; width: 200px;">
                                            </div>
                                        </div>
                                        <div class="mb-3 col-lg-2" style="display: block">
                                           <input type="file" class="form-control-file" name="photo_b{{ $data->prefix }}">
                                       </div>
                                       
                                    </div>            
                                </div>
         
                             </div> 
                             <div class="col-6">
                                <textarea id="my-editor2{{ $data->prefix }}" name="description_b[{{ $data->prefix }}]" class="form-control"></textarea> 
                             </div>
                         </div> 
                         &nbsp
                         <div class="row">
                             <div class="col-6">
                                <textarea id="my-editor3{{ $data->prefix }}" name="description_c[{{ $data->prefix }}]" class="form-control"></textarea> 
                             </div>
                             <div class="col-6">
                                <div>
                                    <div class="dropzone">
                                        <div class="dz-message needsclick">
                                            <div class="mb-3">
                                                <img src="" alt="" style="height: 200px; width: 200px;">
                                            </div>
                                        </div>
                                        <div class="mb-3 col-lg-2" style="display: block">
                                           <input type="file" class="form-control-file" name="photo_c{{ $data->prefix }}">
                                       </div>
                                    </div>            
                                </div>
                             </div> 
                         </div>
                         &nbsp

                    <div class="row">
                        <div class="col-6">
                            <div>
                                <div class="dropzone">
                                    <div class="dz-message needsclick">
                                        <div class="mb-3">
                                            <img src="" alt="" style="height: 200px; width: 200px;">
                                        </div>
                                    </div>
                                    @if($data->prefix == 'en')
                                        <div class="mb-3 col-lg-2" style="display: block">
                                            <input type="file" class="form-control-file" name="photo_b2{{ $data->prefix }}">
                                        </div>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="col-6">
                            <textarea id="my-editor5{{ $data->prefix }}" name="description_b2[{{ $data->prefix }}]" class="form-control"></textarea>
                        </div>
                    </div>
                    &nbsp
                    <div class="row">
                        <div class="col-6">
                            <textarea id="my-editor6{{ $data->prefix }}" name="description_c2[{{ $data->prefix }}]" class="form-control"></textarea>
                        </div>
                        <div class="col-6">
                            <div>
                                <div class="dropzone">
                                    <div class="dz-message needsclick">
                                        <div class="mb-3">
                                            <img src="" alt="" style="height: 200px; width: 200px;">
                                        </div>
                                    </div>
                                    @if($data->prefix == 'en')
                                        <div class="mb-3 col-lg-2" style="display: block">
                                            <input type="file" class="form-control-file" name="photo_c2{{ $data->prefix }}">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    &nbsp
                    <div class="col-12">
                        <div>
                            <div class="dropzone">
                                <div class="dz-message needsclick">
                                    <div class="mb-3">
                                        <img src="" alt="" style="height: 200px; width: 200px;">
                                    </div>
                                </div>
                                @if($data->prefix == 'en')
                                    <div class="mb-3 col-lg-2" style="display: block">
                                        <input type="file" class="form-control-file" name="photo_d{{ $data->prefix }}">
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <textarea id="my-editor4{{ $data->prefix }}" name="description_d[{{ $data->prefix }}]"
                                      class="form-control"></textarea>
                        </div>
                    </div>
                    &nbsp
                </div>
                @endforeach
                <div class="col-12">
                    <div>
                        <input type="text" class="form-control"
                                parsley-type="email" placeholder="Ссылка на видео" name="link">
                    </div>
                </div>
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
            <h4 class="card-title">Семейный церимониал</h4>
            <p class="card-title-desc"></p>
            <!-- Nav tabs -->
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
            <!-- Tab panes -->
            <div class="tab-content p-3 text-muted">
                @foreach(App\Lang::all() as $data)
                <div class="tab-pane @if($data->prefix == 'en') active @endif" id="modal{{ $data->prefix }}" role="tabpanel"> 
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th style="text-align: center; width: 20px">#</th>
                            <th>Заголовок</th>
                            <th style="width: 10rem; text-align:center">Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $k=1 ?>
                    @foreach(App\Family::where('lang', $data->prefix)->get() as $datum)
                        <tr>
                            <th style="text-align: center">{{ $k }}</th>
                            <td>{{ $datum->header }}</td>
                            <td style="display: flex; justify-content: center"> 
                                <button type="submit" class="btn btn-success" style="padding: 0px; height: 30px; width: 30px; margin-right: 15px" data-bs-toggle="modal" data-bs-target=".bs-example-modal-xl{{ $datum->id }}"><i class="uil-pen"></i></button>
                                
                                <button class="btn btn-danger" style="padding: 0px; height: 30px; width: 30px;" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg-delete{{ $datum->id }}"><i class="uil-trash"></i></button>
                             </td>
                        </tr>
                        <div class="modal fade bs-example-modal-xl{{ $datum->id }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Изменить</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/family/{{ $datum->id }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('put') }}
                                             <div class="row">
                                                 <div class="col-6">
                                                     <div>
                                                         <input type="text" class="form-control" required parsley-type="email" placeholder="Заголовок" name="header" value="{{ $datum->header }}"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-6">
                                                     <div>
                                                         <input type="text" class="form-control" required parsley-type="email" placeholder="Тип церимонии" name="type_of_cerimony" value="{{ $datum->type_of_cerimony }}"/>
                                                     </div>
                                                 </div>
                                             </div>
                                             <input type="hidden" value="{{ $datum->lang }}" name="lang">
                                             &nbsp
                                                 <div class="col-12">
                                                    <div>
                                                        <div class="dropzone">
                                                            <div class="dz-message needsclick">
                                                                <div class="mb-3">
                                                                    <img src="{{ $datum->photo_a }}" alt="" style="height: 200px; width: 200px;">
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 col-lg-2" style="display: block">
                                                               <input type="file" class="form-control-file" name="photo_a">
                                                           </div>
                                                        </div>            
                                                    </div>
                                                 </div> <!-- end col -->
                                             &nbsp
                                             <div class="col-12">
                                                 <div>
                                                     <textarea id="my-editor{{ $datum->id }}{{ $datum->lang }}1" class="form-control" name="description_a">{{ $datum->description_a }}</textarea>
                                                 </div>
                                             </div>
                                             &nbsp           
                                             <div class="row">
                                                 <div class="col-6">
                                                    <div>
                                                        <div class="dropzone">
                                                            <div class="dz-message needsclick">
                                                                <div class="mb-3">
                                                                    <img src="{{ $datum->photo_b }}" alt="" style="height: 200px; width: 200px;">
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 col-lg-2" style="display: block">
                                                               <input type="file" class="form-control-file" name="photo_b">
                                                           </div>
                                                        </div>            
                                                    </div>
                                                 </div> 
                                                 <div class="col-6">
                                                     <div>
                                                         <textarea id="my-editor{{ $datum->id }}{{ $datum->lang }}2" class="form-control" rows="17" name="description_b">{{ $datum->description_b }}</textarea>
                                                     </div>
                                                 </div>
                                             </div> 
                                             &nbsp
                                             <div class="row">
                                                 <div class="col-6">
                                                     <div>
                                                         <textarea id="my-editor{{ $datum->id }}{{ $datum->lang }}3" class="form-control" rows="17" name="description_c">{{ $datum->description_c }}</textarea>
                                                     </div>
                                                 </div>
                                                 <div class="col-6">
                                                    <div>
                                                        <div class="dropzone">
                                                            <div class="dz-message needsclick">
                                                                <div class="mb-3">
                                                                    <img src="{{ $datum->photo_c }}" alt="" style="height: 200px; width: 200px;">
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 col-lg-2" style="display: block">
                                                               <input type="file" class="form-control-file" name="photo_c">
                                                           </div>
                                                        </div>            
                                                    </div>
                                                 </div> 
                                             </div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <div>
                                                        <div class="dropzone">
                                                            <div class="dz-message needsclick">
                                                                <div class="mb-3">
                                                                    <img src="{{ $datum->photo_b2 }}" alt="" style="height: 200px; width: 200px;">
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 col-lg-2" style="display: block">
                                                                <input type="file" class="form-control-file" name="photo_b2">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div>
                                                        <textarea id="my-editor{{ $datum->id }}{{ $datum->lang }}5" class="form-control" rows="17" name="description_b2">{{ $datum->description_b2 }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            &nbsp
                                            <div class="row">
                                                <div class="col-6">
                                                    <div>
                                                        <textarea id="my-editor{{ $datum->id }}{{ $datum->lang }}6" class="form-control" rows="17" name="description_c2">{{ $datum->description_c2 }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div>
                                                        <div class="dropzone">
                                                            <div class="dz-message needsclick">
                                                                <div class="mb-3">
                                                                    <img src="{{ $datum->photo_c2 }}" alt="" style="height: 200px; width: 200px;">
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 col-lg-2" style="display: block">
                                                                <input type="file" class="form-control-file" name="photo_c2">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             &nbsp
                                            <div class="col-12">
                                                <div>
                                                    <div class="dropzone">
                                                        <div class="dz-message needsclick">
                                                            <div class="mb-3">
                                                                <img src="{{ $datum->photo_d }}" alt="" style="height: 200px; width: 200px;">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 col-lg-2" style="display: block">
                                                            <input type="file" class="form-control-file" name="photo_d">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                 <div class="col-12">
                                                     <div>
                                                         <textarea id="my-editor{{ $datum->id }}{{ $datum->lang }}4" class="form-control" rows="17" name="description_d">{{ $datum->description_d }}</textarea>
                                                     </div>
                                                 </div>
                                             </div>
                                             &nbsp
                                             <div class="col-12">
                                                 <div>
                                                     <input type="text" class="form-control" required
                                                             parsley-type="email" placeholder="Ссылка на видео" name="link" value="{{ $datum->link }}">
                                                 </div>
                                             </div>
                         
                                             <div class="text-center mt-4">
                                                 <button type="submit" class="btn btn-primary"> Сохранить </button>
                                             </div>           
                                        </form>
                                    </div>
                                </div>
                            </div><!-- /.modal-dialog -->
                        </div>
                        <div class="modal fade bs-example-modal-lg-delete{{ $datum->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Удалить ?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        </button>
                                    </div>
                                    <div class="modal-body" style="text-align: center">
                                        <form action="/family/{{ $datum->one_id }}" method="POST">
                                            @csrf
                                            {{ method_field('delete') }}
                                            <button class="btn btn-danger" style="padding: 0px; height: 30px; width: 30px;"><i class="uil-trash"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div><!-- /.modal-dialog -->
                        </div>
                        <?php $k++ ?>
                    @endforeach
                        
                    </tbody>
                </table>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
