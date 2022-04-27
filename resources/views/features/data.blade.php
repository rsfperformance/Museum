@extends('admin.full')

@section('content')
<div class="col-xl-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Региональные особенности</h4>

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
                @foreach (App\Features::where('one_id', $item->one_id)->get() as $datum)  

                @if($data->prefix == $datum->lang) 
                <form action="/features/{{ $datum->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('put') }} 
                     <div class="col-12">
                         <div>
                             <input type="text" class="form-control" required
                                     parsley-type="email" placeholder="Заголовок" name="header" @if($data->prefix == $datum->lang) value="{{ $datum->header }}" @endif/>
                         </div>
                     </div>
                     <input type="hidden" value="{{ $datum->one_id }}" name="one_id">
                     <input type="hidden" value="{{ $data->prefix }}" name="lang">
                     &nbsp
                         <div class="col-12">
                                     <div>
                                         <div class="dropzone">
                                             <div class="dz-message needsclick">
                                                 <div class="mb-3">
                                                     <img src="{{ $datum->photo_a }}" alt="" style="height: 200px; width: 300px;">
                                                 </div>
                                             </div>
                                             <div class="mb-3 col-lg-2" style="display: block">
                                                <input type="file" class="form-control-file" name="photo_a" value="{{ $datum->photo_a }}">
                                            </div>
                                            
                                         </div>            
                                     </div>
                         </div> 
                     
                     &nbsp
                     <div class="col-12">
                         
                         <div>
                             <textarea id="my-editor{{ $data->prefix }}1" class="form-control" rows="10" name="description_a">@if($data->prefix == $datum->lang) {{ $datum->description_a }} @endif</textarea>
                         </div>
                     </div>
                     &nbsp           
                     <div class="row">
                         <div class="col-6">
                                     <div>
                                         <div action="form-uploads.html#" class="dropzone">
                                             <div class="dz-message needsclick">
                                                 <div class="mb-3">
                                                    <img src="{{ $datum->photo_b }}" alt="" style="height: 200px; width:300px;">
                                                 </div>
                                                 
                                             </div>
                                             <div class="fallback">
                                                <input name="photo_b" type="file" value="{{ $datum->photo_b }}">
                                            </div>
                                         </div>
                                     </div>
     
                         </div> 
                         <div class="col-6">
                            
                             <div>
                                 <textarea id="my-editor{{ $data->prefix }}2" class="form-control" rows="18" name="description_b">@if($data->prefix == $datum->lang) {{ $datum->description_b }} @endif</textarea>
                             </div>
                         </div>
                     </div> 
                     &nbsp
                     <div class="row">
                         <div class="col-6">
                             
                             <div>
                                 <textarea id="my-editor{{ $data->prefix }}3" class="form-control" rows="18" name="description_c">@if($data->prefix == $datum->lang) {{ $datum->description_c }} @endif</textarea>
                             </div>
                         </div>
                         <div class="col-6">
                                     <div>
                                         <div action="form-uploads.html#" class="dropzone">
                                             <div class="dz-message needsclick">
                                                 <div class="mb-3">
                                                    <img src="{{ $datum->photo_c }}" alt="" style="height: 200px; width: 300px;">
                                                 </div>
                                                 
                                             </div>
                                             <div class="fallback">
                                                <input name="photo_c" type="file" value="{{ $datum->photo_c }}">
                                            </div>
                                         </div>
                                     </div>
                         </div> 
                     </div>
                     &nbsp
                     <div class="row">
                         <div class="col-12">
                            
                             <div>
                                 <textarea id="my-editor{{ $data->prefix }}4" class="form-control" rows="10" name="description_d">@if($data->prefix == $datum->lang) {{ $datum->description_d }} @endif</textarea>
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
                         <button type="submit" class="btn btn-primary"> Изменить </button>
                     </div>          
                </form>
                @endif

                @endforeach

                {{-- <form action="/features" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                     <div class="col-12">
                         <div>
                             <input type="text" class="form-control" required
                                     parsley-type="email" placeholder="Заголовок" name="header"/>
                         </div>
                     </div>
                     <input type="hidden" value="1" name="one_id">
                     <input type="hidden" value="{{ $data->prefix }}" name="lang">
                     &nbsp
                         <div class="col-12">
                                     <div>
                                         <div action="form-uploads.html#" class="dropzone">
                                             <div class="fallback">
                                                 <input name="photo_a" type="file" multiple="multiple" name="photo_a">
                                             </div>
                                             <div class="dz-message needsclick">
                                                 <div class="mb-3">
                                                     <i class="display-4 text-muted uil uil-cloud-upload"></i>
                                                 </div>
                                                 
                                                 <h4>Выберите файл</h4>
                                             </div>
                                         </div>
                                     </div>
                 
                         </div> <!-- end col -->
                     
                     &nbsp
                     <div class="col-12">
                        
                         <div>
                             <textarea required class="form-control" rows="10" name="description_a"></textarea>
                         </div>
                     </div>
                     &nbsp           
                     <div class="row">
                         <div class="col-6">
                                     <div>
                                         <div action="form-uploads.html#" class="dropzone">
                                             <div class="fallback">
                                                 <input name="photo_b" type="file" name="photo_b">
                                             </div>
                                             <div class="dz-message needsclick">
                                                 <div class="mb-3">
                                                     <i class="display-4 text-muted uil uil-cloud-upload"></i>
                                                 </div>
                                                 
                                                 <h4>Выберите файл</h4>
                                             </div>
                                         </div>
                                     </div>
     
                         </div> 
                         <div class="col-6">
                            
                             <div>
                                 <textarea required class="form-control" rows="11" name="description_b"></textarea>
                             </div>
                         </div>
                     </div> 
                     &nbsp
                     <div class="row">
                         <div class="col-6">
                            
                             <div>
                                 <textarea required class="form-control" rows="11" name="description_c"></textarea>
                             </div>
                         </div>
                         <div class="col-6">
                                     <div>
                                         <div action="form-uploads.html#" class="dropzone">
                                             <div class="fallback">
                                                 <input name="photo_c" type="file" name="photo_c">
                                             </div>
                                             <div class="dz-message needsclick">
                                                 <div class="mb-3">
                                                     <i class="display-4 text-muted uil uil-cloud-upload"></i>
                                                 </div>
                                                 
                                                 <h4>Выберите файл</h4>
                                             </div>
                                         </div>
                                     </div>
                         </div> 
                     </div>
                     &nbsp
                     <div class="row">
                         <div class="col-12">
                            
                             <div>
                                 <textarea required class="form-control" rows="10" name="description_d"></textarea>
                             </div>
                         </div>
                     </div>
                     &nbsp
                     <div class="col-12">
                         <div>
                             <input type="text" class="form-control" required
                                     parsley-type="email" placeholder="Ссылка на видео" name="link">
                         </div>
                     </div>
 
                     <div class="text-center mt-4">
                         <button type="submit" class="btn btn-primary"> Сохранить </button>
                     </div>           
                </form> --}}
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection