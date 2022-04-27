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
            <h4 class="card-title">О музее</h4>
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
                        @foreach (App\About::orderBy('id')->get() as $datum)
                            @if($data->prefix == $datum->lang)
                                <form action="/about/{{ $datum->id }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    {{ method_field('put') }}
                                     <input type="hidden" value="{{ $data->prefix }}" name="lang">
                                     &nbsp
                                     <div class="row">
                                        <div class="col-12">
                                            <div>
                                                <textarea id="my-editor{{ $data->prefix }}" class="form-control" rows="12" name="description">@if($data->prefix == $datum->lang) {{ $datum->description }} @endif</textarea>
                                            </div>
                                            &nbsp
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="text" class="form-control" required
                                                            parsley-type="email" placeholder="Количество поситителей" name="visitors" @if($data->prefix == $datum->lang) value="{{ $datum->visitors }}" @endif/>
                                                </div>
                                                <div class="col-6">
                                                    <input type="text" class="form-control" required
                                                            parsley-type="email" placeholder="Количество публикаций" name="photonumb" @if($data->prefix == $datum->lang) value="{{ $datum->photonumb }}" @endif/>
                                                </div>
                                            </div>
                                        </div>
                                     </div>
                                     &nbsp
                                     <div class="text-center mt-4">
                                         <button type="submit" class="btn btn-primary"> Изменить </button>
                                     </div>
                                </form>
                                <h3>Наша миссия</h3>
                                <form action="/about/{{ $datum->id }}" method="POST" enctype="multipart/form-data">
                                     @csrf
                                     {{ method_field('put') }}
                                     <input type="hidden" value="{{ $data->prefix }}" name="lang">
                                     <div class="row">
                                        <div class="col-6">
                                            <textarea id="my-editor{{ $data->prefix }}1" name="description_a" placeholder="1." style="min-height: 200px"> {{ $datum->description_a }} </textarea>
                                        </div>
                                        <div class="col-6">
                                            <div class="dropzone">
                                                <div class="dz-message needsclick">
                                                    <div class="mb-3">
                                                        <img src="{{ $datum->photo_a }}" alt="" style="height: 200px; width: 300px;">
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-lg-2" style="display: block">
                                                    <input type="file" class="form-control-file" name="photo_a"
                                                           value="{{ $datum->photo_a }}">
                                                </div>
                                            </div>
                                        </div>
                                     </div>
                                     &nbsp
                                     <div class="row">
                                         <div class="col-6">
                                             <div class="dropzone">
                                                 <div class="dz-message needsclick">
                                                     <div class="mb-3">
                                                         <img src="{{ $datum->photo_b }}" alt="" style="height: 200px; width: 300px;">
                                                     </div>
                                                 </div>
                                                 <div class="mb-3 col-lg-2" style="display: block">
                                                     <input type="file" class="form-control-file" name="photo_b"
                                                            value="{{ $datum->photo_b }}">
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="col-6">
                                             <div>
                                                 <textarea id="my-editor{{ $data->prefix }}2" class="form-control" rows="17" name="description_b" placeholder="2.">@if($data->prefix == $datum->lang) {{ $datum->description_b }} @endif</textarea>
                                             </div>
                                         </div>
                                     </div>
                                     &nbsp
                                     <div class="row">
                                         <div class="col-6">
                                             <div>
                                                 <textarea id="my-editor{{ $data->prefix }}3" class="form-control" rows="17" name="description_c" placeholder="3.">@if($data->prefix == $datum->lang) {{ $datum->description_c }} @endif</textarea>
                                             </div>
                                         </div>
                                         <div class="col-6">
                                             <div class="dropzone">
                                                 <div class="dz-message needsclick">
                                                     <div class="mb-3">
                                                         <img src="{{ $datum->photo_c }}" alt="" style="height: 200px; width: 300px;">
                                                     </div>
                                                 </div>
                                                 <div class="mb-3 col-lg-2" style="display: block">
                                                     <input type="file" class="form-control-file" name="photo_c"
                                                            value="{{ $datum->photo_c }}">
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     &nbsp
                                     <div class="text-center mt-4">
                                         <button type="submit" class="btn btn-primary"> Изменить </button>
                                     </div>
                                </form>
                                <h3>Наше видение</h3>
                                <form action="/about/{{ $datum->id }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    {{ method_field('put') }}
                                     <input type="hidden" value="{{ $data->prefix }}" name="lang">
                                     &nbsp
                                     <div class="row">
                                        <div class="col-6">
                                            <div>
                                                <textarea id="my-editor{{ $data->prefix }}4" class="form-control" rows="10" name="description_d">@if($data->prefix == $datum->lang) {{ $datum->description_d }} @endif</textarea>
                                            </div>
                                            &nbsp
                                            <div>
                                                <div class="dropzone">
                                                    <div class="dz-message needsclick">
                                                        <div class="mb-3">
                                                            <img src="{{ $datum->photo_d }}" alt="" style="height: 185px; width: 300px;">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 col-lg-2">
                                                       <input type="file" class="form-control-file" name="photo_d" value="{{ $datum->photo_d }}">
                                                   </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6" >
                                            <div>
                                                <div class="dropzone" style="height: 775px">
                                                    <div class="dz-message needsclick">
                                                        <div class="mb-3">
                                                            <img src="{{ $datum->photo_e }}" alt="" style="height: 550px; width: 300px;">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 col-lg-2" style="display: block">
                                                       <input type="file" class="form-control-file" name="photo_e" value="{{ $datum->photo_e }}">
                                                   </div>
                                                </div>
                                            </div>
                                        </div>
                                     </div>
                                     &nbsp
                                     <div class="row">
                                         <div class="col-6">
                                             <div>
                                                 <textarea id="my-editor{{ $data->prefix }}5" class="form-control" rows="16" name="description_e">@if($data->prefix == $datum->lang) {{ $datum->description_e }} @endif</textarea>
                                             </div>
                                         </div>
                                         <div class="col-6">
                                             <div>
                                                 <div class="dropzone">
                                                     <div class="dz-message needsclick">
                                                         <div class="mb-3">
                                                             <img src="{{ $datum->photo_f }}" alt=""
                                                                  style="height: 215px; width:300px;">
                                                         </div>

                                                     </div>
                                                     <div class="fallback">
                                                         <input name="photo_f" type="file" value="{{ $datum->photo_f }}">
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     &nbsp
                                     <div class="text-center mt-4">
                                         <button type="submit" class="btn btn-primary"> Изменить </button>
                                     </div>
                                </form>
                            @endif
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
