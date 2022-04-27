@extends('admin.full')

@section('content')
<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Полезные ресурсы.
                @if(isset($item->type))
                    @if($item->type == 1) Монографии @endif
                    @if($item->type == 2) Публикации @endif
                    @if($item->type == 3) Научные статьи @endif
                    @if($item->type == 4) Диссертации @endif
                    @if($item->type == 5) Статьи в СМИ @endif
                    @if($item->type == 6) Изречения, пословицы, поговорки, стихи @endif
                    @if($item->type == 7) Интернет ссылки @endif
                @else
                    @if($item == 1) Монографии @endif
                    @if($item == 2) Публикации @endif
                    @if($item == 3) Научные статьи @endif
                    @if($item == 4) Диссертации @endif
                    @if($item == 5) Статьи в СМИ @endif
                    @if($item == 6) Изречения, пословицы, поговорки, стихи @endif
                    @if($item == 7) Интернет ссылки @endif
                @endif
            </h4>
            <p class="card-title-desc"></p>
            <div class="tab-content p-3 text-muted">
                <form action="/useful" method="POST" enctype="multipart/form-data">
                    @csrf
                    <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                        @foreach(App\Lang::all() as $data)
                            <li class="nav-item">
                                <a class="nav-link @if($data->prefix == 'en') active @endif" data-bs-toggle="tab"
                                   href="#main{{ $data->prefix }}" role="tab">
                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                    <span class="d-none d-sm-block">{{ $data->name }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="tab-content p-3 text-muted">
                        @foreach(App\Lang::all() as $data )
                            <div class="tab-pane @if($data->prefix == 'en') active @endif" id="main{{ $data->prefix }}"
                                 role="tabpanel">
                                <div class="col-12">
                                    <div>
                                        <input type="text" class="form-control" placeholder="Заголовок"
                                               name="header[{{$data->prefix}}]"/>
                                    </div>
                                </div>
                                
                                @if(isset($item->type))
                                    @if($item->type != 1 && $item->type != 7 && $item->type != 5 && $item->type != 3)
                                        &nbsp;
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <p>Описание:</p>
                                                <textarea id="my-editor{{ $data->prefix }}" name="description[{{ $data->prefix }}]" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    @endif
                                @else
                                    @if($item != 1 && $item != 7 && $item != 5 && $item != 3)
                                        &nbsp;
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <p>Описание:</p>
                                                <textarea id="my-editor{{ $data->prefix }}" name="description[{{ $data->prefix }}]" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        @endforeach
                            <input type="hidden" @if(isset($item->type)) value="{{ $item->type }}" @else value="{{ $item }}" @endif name="type">
                            @if(isset($item->type))
                                @if($item->type == 1 || $item->type == 7 || $item->type == 5 || $item->type == 3)
                                    &nbsp;
                                    <div class="col-12">
                                        <div>
                                            <input type="text" class="form-control" required
                                                   parsley-type="email" placeholder="Ссылка на источник" name="link" value="">
                                        </div>
                                    </div>
                                @endif
                            @else
                                @if($item == 1 || $item == 7 || $item == 5 || $item == 3)
                                    &nbsp;
                                    <div class="col-12">
                                        <div>
                                            <input type="text" class="form-control" required
                                                   parsley-type="email" placeholder="Ссылка на источник" name="link" value="">
                                        </div>
                                    </div>
                                @endif
                            @endif
                            &nbsp;
                            <div class="col-12">
                                <div class="dropzone">
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
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
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
                                            <th>Фото</th>
                                            <th>Заголовок</th>
                                            <th>Действия</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $k = 1 ?>
                                        @if(isset($item->type))
                                            @foreach(App\Useful::where('type', $item->type)->get() as $datum)
                                                @if($datum->lang == $data->prefix)
                                                    <tr>
                                                        <th>{{ $k }}</th>
                                                        <td>
                                                            <img src="{{ $datum->photo }}" alt="" style="height: 50px; width: 50px">
                                                        </td>
                                                        <td>{{ $datum->header }}</td>
                                                        <td style="display: flex">
                                                            <button type="submit" class="btn btn-success"
                                                                    style="padding: 0px; height: 30px; width: 30px; margin-right: 5px"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target=".bs-example-modal-lg{{ $datum->id }}"><i
                                                                    class="uil-pen"></i></button>
                                                            <button type="submit" class="btn btn-danger"
                                                                    style="padding: 0px; height: 30px; width: 30px; margin-right: 5px"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target=".bs-example-modal-lg-delete{{ $datum->id }}">
                                                                <i class="uil-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                <div class="modal fade bs-example-modal-lg{{ $datum->id }}" tabindex="-1"
                                                     role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Изменить</h5>
                                                                <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close">
                                                                </button>
                                                            </div>
                                                                <div class="modal-body">
                                                                    <form action="/useful/{{ $datum->id }}" method="POST"
                                                                      enctype="multipart/form-data">
                                                                    @csrf
                                                                    {{ method_field('put') }}
                                                                    <div class="col-12">
                                                                        <div>
                                                                            <label class="col-md-2 col-form-label">Заголовок:</label>
                                                                            <input type="text" class="form-control" required
                                                                                   parsley-type="email"
                                                                                   placeholder="Заголовок" name="header"
                                                                                   value="{{ $datum->header }}"/>
                                                                        </div>
                                                                    </div>
                                                                    <input type="hidden" value="{{ $datum->type }}"
                                                                           name="type">
                                                                    &nbsp
                                                                    <div class="col-12">
                                                                        <div>
                                                                            <div class="dropzone">
                                                                                <div class="dz-message needsclick">
                                                                                    <div class="mb-3">
                                                                                        <img src="{{ $datum->photo }}"
                                                                                             alt="" style="height: 400px; width: 600px">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="mb-3 col-lg-2"
                                                                                     style="display: block">
                                                                                    <input type="file"
                                                                                           class="form-control-file"
                                                                                           name="photo"
                                                                                           value="{{ $datum->photo }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    &nbsp
                                                                    <div class="col-lg-12">
                                                                        <p>Описание:</p>
                                                                        <textarea id="my-editor{{ $datum->id }}"
                                                                                  name="description"
                                                                                  class="form-control">{{ $datum->description }}</textarea>
                                                                    </div>

                                                                    @if($item->type == 1 || $item->type == 7 || $item->type == 5 || $item->type == 3)
                                                                        &nbsp
                                                                        <div class="col-12">
                                                                            <div>
                                                                                <label class="col-md-2 col-form-label">Ссылка</label>
                                                                                <input type="text" class="form-control"
                                                                                       required
                                                                                       parsley-type="email"
                                                                                       placeholder="Ссылка" name="link"
                                                                                       value="{{ $datum->link }}"/>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                    &nbsp

                                                                    <div class="text-center mt-4">
                                                                        <button type="submit" class="btn btn-primary">
                                                                            Изменить
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div><!-- /.modal-dialog -->
                                                </div>

                                                <div class="modal fade bs-example-modal-lg-delete{{ $datum->id }}"
                                                     tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                                                     aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Удалить?</h5>
                                                                <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close">
                                                                </button>
                                                            </div>
                                                            <div class="modal-body"
                                                                 style="justify-content: center; text-align: center">
                                                                <form
                                                                    action="/useful/{{ $datum->id }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    {{ method_field('delete') }}
                                                                    <button class="btn btn-danger"
                                                                            style="padding: 0px; height: 30px; width: 30px;">
                                                                        <i class="uil-trash"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
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
