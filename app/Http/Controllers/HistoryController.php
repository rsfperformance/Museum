<?php

namespace App\Http\Controllers;

use App\History;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }
    public function index(){
        return view('history.data');
    }

    public function show($oneid){
        if (session()->get('locale') == '') {
            session()->put('locale', 'en');
            app()->setLocale('ru');
        } else {
            app()->setLocale(session()->get('locale'));
        }
        $lan = session()->get('locale');
        $one_id = $oneid; 
        return view('history.single', ['one_id' => $one_id, 'lan' => $lan,]);
    }

    public function edit($id){
        $item = History::where('one_id', $id)->first();
        // dd($item->header);
         return view('history.data', ['item' => $item]);
     }

    public function store(Request $request){
        $data = History::create($request->all());
        if(!empty($request->file('photo')))
        {
            $str = Str::random(10);
            $request->file('photo')->move(base_path() . '/public/img_history/', $str . '.' . $request->file('photo')->getClientOriginalExtension());

            History::find($data->id)->update([
                'photo' => '/img_history/' . $str . '.' . $request->file('photo')->getClientOriginalExtension()
            ]);
        }
        return back();
    }

    public function update(Request $request,$id){
        $value = array_except($request->all(), ['photo_a', 'photo_b', 'photo_c', 'photo_b2', 'photo_c2', 'photo_d']);
         History::find($id)->update($value);


        if(!empty($request->file('photo_a')))
        {
            if(is_file(base_path('/public' . History::find($id)->photo_a))) {
                unlink(base_path('/public' . History::find($id)->photo_a));
            }
            $str = Str::random(10);
            $request->file('photo_a')->move(base_path() . '/public/img_history/', $str . '.' . $request->file('photo_a')->getClientOriginalExtension());
                
                    History::where('one_id', $request->one_id)->update([
                        'photo_a' => '/img_history/' . $str . '.' . $request->file('photo_a')->getClientOriginalExtension()
                    ]);
            
            
        }

        if(!empty($request->file('photo_b')))
        {
            if(is_file(base_path('/public' . History::find($id)->photo_b))) {
                unlink(base_path('/public' . History::find($id)->photo_b));
            }
            $str = Str::random(10);
            $request->file('photo_b')->move(base_path() . '/public/img_history/', $str . '.' . $request->file('photo_b')->getClientOriginalExtension());

            History::where('one_id', $request->one_id)->update([
                'photo_b' => '/img_history/' . $str . '.' . $request->file('photo_b')->getClientOriginalExtension()
            ]);
        }

        if(!empty($request->file('photo_c')))
        {
            if(is_file(base_path('/public' . History::find($id)->photo_c))) {
                unlink(base_path('/public' . History::find($id)->photo_c));
            }
            $str = Str::random(10);
            $request->file('photo_c')->move(base_path() . '/public/img_history/', $str . '.' . $request->file('photo_c')->getClientOriginalExtension());

            History::where('one_id', $request->one_id)->update([
                'photo_c' => '/img_history/' . $str . '.' . $request->file('photo_c')->getClientOriginalExtension()
            ]);
        }

        if(!empty($request->file('photo_b2')))
        {
            if(is_file(base_path('/public' . History::find($id)->photo_b2))) {
                unlink(base_path('/public' . History::find($id)->photo_b2));
            }
            $str = Str::random(10);
            $request->file('photo_b2')->move(base_path() . '/public/img_history/', $str . '.' . $request->file('photo_b2')->getClientOriginalExtension());

            History::where('one_id', $request->one_id)->update([
                'photo_b2' => '/img_history/' . $str . '.' . $request->file('photo_b2')->getClientOriginalExtension()
            ]);
        }

        if(!empty($request->file('photo_c2')))
        {
            if(is_file(base_path('/public' . History::find($id)->photo_c2))) {
                unlink(base_path('/public' . History::find($id)->photo_c2));
            }
            $str = Str::random(10);
            $request->file('photo_c2')->move(base_path() . '/public/img_history/', $str . '.' . $request->file('photo_c2')->getClientOriginalExtension());

            History::where('one_id', $request->one_id)->update([
                'photo_c2' => '/img_history/' . $str . '.' . $request->file('photo_c')->getClientOriginalExtension()
            ]);
        }

        if(!empty($request->file('photo_d')))
        {
            if(is_file(base_path('/public' . History::find($id)->photo_d))) {
                unlink(base_path('/public' . History::find($id)->photo_d));
            }
            $str = Str::random(10);
            $request->file('photo_d')->move(base_path() . '/public/img_history/', $str . '.' . $request->file('photo_d')->getClientOriginalExtension());

            History::where('one_id', $request->one_id)->update([
                'photo_d' => '/img_history/' . $str . '.' . $request->file('photo_d')->getClientOriginalExtension()
            ]);
        }

        return back();
    }
}
