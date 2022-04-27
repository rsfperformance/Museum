@extends('admin.full')

@section('content')
{{--@foreach(\App\Photo::all() as $data)--}}
    {{--@if($data->photo_a == '/photo/vZ782WA4os.jpg' || $data->photo_b == '/photo/vZ782WA4os.jpg' || $data->photo_c == '/photo/vZ782WA4os.jpg' || $data->photo_d == '/photo/vZ782WA4os.jpg' || $data->photo_e == '/photo/vZ782WA4os.jpg' || $data->photo_f == '/photo/vZ782WA4os.jpg')--}}
            {{--{{ 1 }}--}}
    {{--@endif--}}
{{--@endforeach--}}
<div class="col-xl-12">
    <form action="/photos" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Фото галерея</h4>
            <p class="card-title-desc"></p>
            <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                @foreach(App\Lang::orderBy('id')->get() as $data)
                <li class="nav-item">
                    <a class="nav-link @if($data->prefix == 'en') active @endif" data-bs-toggle="tab" href="#modal{{ $data->prefix }}" role="tab">
                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                        <span class="d-none d-sm-block">
                            {{ $data->name }}
                        </span>
                    </a>
                </li>
                @endforeach
            </ul>
            <!-- Tab panes -->
            <div class="tab-content p-3 text-muted">
                        @foreach(App\Lang::all() as $data)
                            <div class="tab-pane @if($data->prefix == 'en') active @endif" id="modal{{ $data->prefix }}" role="tabpanel"> 
                                <div class="row">
                                    <div class="col-lg-12">   
                                        <div class="row">
                                            {{-- 1 --}}
                                            <div class="col-4">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div action="form-uploads.html#" class="dropzone">
                                                            <div class="dz-message needsclick">
                                                                <div class="mb-3">
                                                                <img src="" alt="" style="height: 200px; width: 250px;">
                                                                </div>
                                                            </div>
                                                            <input name="photo_a{{ $data->prefix }}" type="file" value="">
                                                        </div>
                                                        <input type="text" class="form-control"
                                                            parsley-type="email" placeholder="Описание" name="header_a[{{ $data->prefix }}]"/>
                                                    </div>
                                                </div>
                                                &nbsp
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div>
                                                            <div action="form-uploads.html#" class="dropzone">
                                                                <div class="dz-message needsclick">
                                                                    <div class="mb-3">
                                                                    <img src="" alt="" style="height: 200px; width: 95px;">
                                                                    </div>
                                                                    
                                                                </div>
                                                                
                                                                <input name="photo_b{{ $data->prefix }}" type="file" value="" style="width: 125px">
                                                            
                                                            </div>
                                                        </div>
                                                        <input type="text" class="form-control"
                                                            parsley-type="email" placeholder="Описание" name="header_b[{{ $data->prefix }}]"/>
                                                    </div>
                                                    <div class="col-6">
                                                        <div>
                                                            <div action="form-uploads.html#" class="dropzone" >
                                                                <div class="dz-message needsclick">
                                                                    <div class="mb-3">
                                                                    <img src="" alt="" style="height: 200px; width: 95px;">
                                                                    </div>
                                                                    
                                                                </div>
                                                                    <input name="photo_c{{ $data->prefix }}" type="file" value="" style="width: 125px">
                                                            </div>
                                                        </div>
                                                        <input type="text" class="form-control"
                                                            parsley-type="email" placeholder="Описание" name="header_c[{{ $data->prefix }}]"/>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            {{-- 2 --}}
                                            <div class="col-4">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div action="form-uploads.html#" class="dropzone" style="height: 795px">
                                                            <div class="dz-message needsclick">
                                                                <div class="mb-3">
                                                                    <img src="" alt="" style="height: 600px; width: 250px;">
                                                                </div>
                                                            </div>
                                                            <input name="photo_d{{ $data->prefix }}" type="file" value="">                                                           
                                                        </div>
                                                    </div>
                                                        <input type="text" class="form-control"
                                                            parsley-type="email" placeholder="Описание" name="header_d[{{ $data->prefix }}]"/>
                                                </div>                                                
                                            </div>

                                            {{-- 3 --}}
                                            <div class="col-4">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div action="form-uploads.html#" class="dropzone">
                                                            <div class="dz-message needsclick">
                                                                <div class="mb-3">
                                                                    <img src="" alt="" style="height: 200px; width: 250px;">
                                                                </div>                                                                    
                                                            </div>
                                                            <input name="photo_e{{ $data->prefix }}" type="file" value=""> 
                                                        </div>                                                        
                                                       <input type="text" class="form-control"
                                                            parsley-type="email" placeholder="Описание" name="header_e[{{ $data->prefix }}]"/>
                                                    </div>
                                                </div>
                                                &nbsp
                                                <div class="row">
                                                    <div class="col-12">                                                        
                                                        <div action="form-uploads.html#" class="dropzone">
                                                            <div class="dz-message needsclick">
                                                                <div class="mb-3">
                                                                    <img src="" alt="" style="height: 200px; width: 250px;">
                                                                </div>
                                                            </div>                                                               
                                                            <input name="photo_f{{ $data->prefix }}" type="file" value="">                                                           
                                                        </div>
                                                       
                                                        <input type="text" class="form-control"
                                                            parsley-type="email" placeholder="Описание" name="header_f[{{ $data->prefix }}]"/>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <input type="hidden" value="{{ $data->prefix }}" name="lang"> --}}
                                        </div>   
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary"> Добавить </button>
                        </div>  
                </form>
            </div>
        </div>
    </div>
    </form>
</div>
<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Фото галерея</h4>
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
            <!-- Tab panes -->
            <div class="tab-content p-3 text-muted">
                @foreach(App\Lang::orderBy('id')->get() as $data)
                <div class="tab-pane @if($data->prefix == 'en') active @endif" id="{{ $data->prefix }}" role="tabpanel"> 
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                
                                        <table class="table table-bordered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Альбомы</th>
                                                    <th>Действия</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $k=1 ?>
                                            @foreach(App\Photo::where('lang', $data->prefix)->get() as $datum)
                                                <tr>
                                                    <th>{{ $k }}</th>
                                                    <td>{{ $k }}-Альбом</td>
                                                    <td style="display: flex"> 
                                                        <button type="submit" class="btn btn-success" style="padding: 0px; height: 30px; width: 30px; margin-right: 5px" data-bs-toggle="modal" data-bs-target=".bs-example-modal-xl{{ $datum->id }}"><i class="uil-pen"></i></button>
                                                        
                                                        <button class="btn btn-danger" style="padding: 0px; height: 30px; width: 30px;" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg-delete{{ $datum->id }}"><i class="uil-trash"></i></button>
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
                                                                <form action="/photos/{{ $datum->id }}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    {{ method_field('put') }}
                                                                    <div class="row">
                                                                        {{-- 1 --}}
                                                                        <div class="col-4">
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <div>
                                                                                        <div action="form-uploads.html#" class="dropzone">
                                                                                            <div class="dz-message needsclick">
                                                                                                <div class="mb-3">
                                                                                                   <img src="{{ $datum->photo_a }}" alt="" style="height: 200px; width: 250px;">
                                                                                                </div>
                                                                                                
                                                                                            </div>
                                                                                               <input name="photo_a" type="file" value="{{ $datum->photo_a }}">
                                                                                        </div>
                                                                                    </div>
                                                                                    <input type="text" class="form-control"
                                                                                        parsley-type="email" placeholder="Описание" name="header_a" value="{{ $datum->header_a }}"/>
                                                                                </div>
                                                                            </div>
                                                                            &nbsp
                                                                            <div class="row">
                                                                                <div class="col-6">
                                                                                    <div>
                                                                                        <div action="form-uploads.html#" class="dropzone">
                                                                                            <div class="dz-message needsclick">
                                                                                                <div class="mb-3">
                                                                                                   <img src="{{ $datum->photo_b }}" alt="" style="height: 200px; width: 95px;">
                                                                                                </div>
                                                                                                
                                                                                            </div>
                                                                                            
                                                                                               <input name="photo_b" type="file" value="" style="width: 125px" value="{{ $datum->photo_b }}">
                                                                                          
                                                                                        </div>
                                                                                    </div>
                                                                                    <input type="text" class="form-control"
                                                                                        parsley-type="email" placeholder="Описание" name="header_b" value="{{ $datum->header_b }}"/>
                                                                                </div>
                                                                                <div class="col-6">
                                                                                    <div>
                                                                                        <div action="form-uploads.html#" class="dropzone" >
                                                                                            <div class="dz-message needsclick">
                                                                                                <div class="mb-3">
                                                                                                   <img src="{{ $datum->photo_c }}" alt="" style="height: 200px; width: 95px;">
                                                                                                </div>
                                                                                                
                                                                                            </div>
                                                                                                <input name="photo_c" type="file" value="" style="width: 125px" value="{{ $datum->photo_c }}">
                                                                                        </div>
                                                                                    </div>
                                                                                    <input type="text" class="form-control"
                                                                                        parsley-type="email" placeholder="Описание" name="header_c" value="{{ $datum->header_c }}"/>
                                                                                </div>
                                                                            </div>
                                                                         </div>
                                                                         
                                                                         {{-- 2 --}}
                                                                         <div class="col-4">
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <div>
                                                                                        <div action="form-uploads.html#" class="dropzone" style="height: 795px">
                                                                                            <div class="dz-message needsclick">
                                                                                                <div class="mb-3">
                                                                                                   <img src="{{ $datum->photo_d }}" alt="" style="height: 600px; width: 250px;">
                                                                                                </div>
                                                                                                
                                                                                            </div>
                                                                                            
                                                                                               <input name="photo_d" type="file" value="{{ $datum->photo_d }}">
                                                                                          
                                                                                        </div>
                                                                                    </div>
                                                                                    <input type="text" class="form-control"
                                                                                        parsley-type="email" placeholder="Описание" name="header_d" value="{{ $datum->header_d }}"/>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                
                                                                        {{-- 3 --}}
                                                                        <div class="col-4">
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <div>
                                                                                        <div action="form-uploads.html#" class="dropzone">
                                                                                            <div class="dz-message needsclick">
                                                                                                <div class="mb-3">
                                                                                                   <img src="{{ $datum->photo_e }}" alt="" style="height: 200px; width: 250px;">
                                                                                                </div>
                                                                                                
                                                                                            </div>
                                                                                            
                                                                                               <input name="photo_e" type="file" value="{{ $datum->photo_e }}">
                                                                                          
                                                                                        </div>
                                                                                    </div>
                                                                                    <input type="text" class="form-control"
                                                                                        parsley-type="email" placeholder="Описание" name="header_e" value="{{ $datum->header_e }}"/>
                                                                                </div>
                                                                            </div>
                                                                            &nbsp
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <div>
                                                                                        <div action="form-uploads.html#" class="dropzone">
                                                                                            <div class="dz-message needsclick">
                                                                                                <div class="mb-3">
                                                                                                   <img src="{{ $datum->photo_f }}" alt="" style="height: 200px; width: 250px;">
                                                                                                </div>
                                                                                                
                                                                                            </div>
                                                                                            
                                                                                               <input name="photo_f" type="file" value="{{ $datum->photo_f }}">
                                                                                          
                                                                                        </div>
                                                                                    </div>
                                                                                    <input type="text" class="form-control"
                                                                                        parsley-type="email" placeholder="Описание" name="header_f" value="{{ $datum->header_f }}"/>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <input type="hidden" name="prefix" value="{{ $data->prefix }}">
                                                                        <input type="hidden" name="one_id" value="{{ $datum->one_id }}">
                                                                    </div>
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
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Удалить?</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                                </button>
                                                            </div>
                                                            <div class="modal-body" style="justify-content: center; text-align: center">
                                                                <form action="/photos/{{ $datum->one_id }}" method="POST">
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
                                        </div>
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
