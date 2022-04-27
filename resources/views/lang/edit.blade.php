@extends('admin.full')

@section('content')
<div class="col-xl-12">        
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Словарь - {{ \App\Lang::find($data)->name }}</h4>
                    <div class="table-responsive">
                        <table class="table table-editable table-nowrap align-middle table-edits">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Ключевое слово</th>
                                    <th>Перевод</th>
                                    <th>Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1 ?>
                                <tr>
                                     <form action="/words" method="POST">
                                        @csrf
                                        <td>{{ $i }}</td>
                                        <td><input type="text" name="key"></td>
                                        <td><input type="text" name="translation">
                                            <input type="hidden" name="lang">
                                        </td>
                                        <td style="width: 100px">
                                            <button type="submit" class="btn btn-outline-success"><i class="uil-pen"></i></button>
                                        </td>
                                    </form>
                                    <?php $i++ ?>
                                </tr>
                                @foreach(App\Word::where('lang', $data)->get() as $datum)
                                <tr>
                                    <form action="/words/{{ $datum->id }}" method="POST">
                                        @csrf
                                        {{ method_field('put') }}
                                        <td>{{ $i }}</td>
                                        <td><input type="text" name="key" value="{{ $datum->key }}"></td>
                                        <td><input type="text" name="translation" value="{{ $datum->translation }}"><input type="hidden" name="lang" value="{{ $datum->lang }}"></td>
                                        <td style="width: 100px">
                                            <button type="submit" class="btn btn-outline-success"><i class="uil-pen"></i></button>
                                        </td>
                                    </form>
                                    <?php $i++ ?>
                                </tr>
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
