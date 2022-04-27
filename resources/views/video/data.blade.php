@extends('admin.full')

@section('content')

<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Видео галерея</h4>
            <p class="card-title-desc"></p>
            <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                @for($i=1; $i<=3; $i++)
                <li class="nav-item">
                    <a class="nav-link @if($i==1) active @endif" data-bs-toggle="tab" @if($i==1) href="ui-tabs-accordions.html#a" @endif  @if($i==2) href="ui-tabs-accordions.html#b" @endif  @if($i==3) href="ui-tabs-accordions.html#c" @endif role="tab">
                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                        <span class="d-none d-sm-block">
                            @if($i == 1)Видеоролики@endif
                            @if($i == 2)Документальные фильмы@endif
                            @if($i == 3)Художественные фильмы@endif
                        </span>
                    </a>
                </li>
                @endfor
            </ul>
            <!-- Tab panes -->
            <div class="tab-content p-3 text-muted">
                @for($i=1; $i<=3; $i++)
                <div class="tab-pane @if($i == 1) active @endif" @if($i==1) id="a" @endif @if($i==2) id="b" @endif @if($i==3) id="c" @endif role="tabpanel"> 
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <form action="/videos" method="POST" enctype="multipart/form-data">
                                    @csrf
                                     <div class="col-12">
                                        <input type="text" class="form-control" parsley-type="email" placeholder="Ссылка на видео" name="video"/>
                                     </div>
                                     &nbsp
                                     <div class="col-12">                
                                        <input type="hidden" class="form-control" parsley-type="email" value="{{ $i }}" name="one_id"/>
                                    </div>
                                    <div class="text-center mt-4">
                                        <button type="submit" class="btn btn-primary"> Добавить </button>
                                    </div>           
                                </form>
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
                                        @foreach(App\Video::where('one_id', $i)->get() as $datum)
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
                                                        <div class="modal-body" >
                                                            <form action="/videos/{{ $datum->id }}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                {{ method_field('put') }}
                                                                <div class="col-12">
                                                                    <div>
                                                                        <input type="text" class="form-control" parsley-type="email" placeholder="Ссылка на видео" name="video" value="{{ $datum->video }}"/>
                                                                    </div>
                                                                    <div>
                                                                        <input type="hidden" class="form-control" parsley-type="email" name="one_id" value="{{ $i }}"/>
                                                                    </div>
                                                                </div>
                                                                &nbsp
                                                                <div class="col-12" style="text-align: center">
                                                                    <button type="submit" class="btn btn-primary"> Изменить </button>
                                                                </div>
                                                            </form>
                                                        </div>             
                                                    </div>
                                                </div><!-- /.modal-content -->
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
                                                            <form action="/videos/{{ $datum->id }}" method="POST" >
                                                                @csrf
                                                                {{ method_field('delete') }}
                                                                <button class="btn btn-danger" style="padding: 0px; height: 30px; width: 30px;"><i class="uil-trash"></i></button>
                                                            </form>
                                                        </div>             
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div>
                                        <?php $k++ ?>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </div>
</div>
@endsection
