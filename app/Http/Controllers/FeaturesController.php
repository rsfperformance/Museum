<?php

namespace App\Http\Controllers;

use App\Features;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class FeaturesController extends Controller
{ 
     public function __construct()
    {
        $this->middleware('auth')->except('show');
    }
    public function index(){
        return view('features.data');
    }

    public function show($oneid){
        if (session()->get('locale') == '') {
            session()->put('locale', 'en');
            app()->setLocale('en');
        } else {
            app()->setLocale(session()->get('locale'));
        }
        $lan = session()->get('locale');
       $one_id = $oneid;
        return view('features.single', ['lan' => $lan, 'one_id' => $one_id]);
    }

    public function edit($id){
        $item = Features::where('one_id', $id)->first();
        // dd($item->header);
         return view('features.data', ['item' => $item]);
     }

    public function store(Request $request){
        $data = Features::create($request->all());
        if(!empty($request->file('photo')))
        {
            $str = Str::random(10);
            $request->file('photo_a')->move(base_path() . '/public/img_features/', $str . '.' . $request->file('photo_a')->getClientOriginalExtension());

            Features::where('one_id', $request->one_id)->update([
                'photo_a' => '/img_features/' . $str . '.' . $request->file('photo_a')->getClientOriginalExtension()
            ]);
        }
        if(!empty($request->file('photo_b')))
        {
            $str = Str::random(10);
            $request->file('photo_b')->move(base_path() . '/public/img_features/', $str . '.' . $request->file('photo_b')->getClientOriginalExtension());

            Features::where('one_id', $request->one_id)->update([
                'photo_b' => '/img_features/' . $str . '.' . $request->file('photo_b')->getClientOriginalExtension()
            ]);
        }

        if(!empty($request->file('photo_c')))
        {
            $str = Str::random(10);
            $request->file('photo_c')->move(base_path() . '/public/img_features/', $str . '.' . $request->file('photo_c')->getClientOriginalExtension());

            Features::where('one_id', $request->one_id)->update([
                'photo_c' => '/img_features/' . $str . '.' . $request->file('photo_c')->getClientOriginalExtension()
            ]);
        }
        return back();
    }

    public function update(Request $request,$id){
         $value = array_except($request->all(), ['photo_a', 'photo_b', 'photo_c']);
        Features::find($id)->update($value);

        if(!empty($request->file('photo_a')))
        {
            if(is_file(base_path('/public' . Features::find($id)->photo_a))) {
                unlink(base_path('/public' . Features::find($id)->photo_a));
            }
            $str = Str::random(10);
            $request->file('photo_a')->move(base_path() . '/public/img_features/', $str . '.' . $request->file('photo_a')->getClientOriginalExtension());

            Features::where('one_id', $request->one_id)->update([
                'photo_a' => '/img_features/' . $str . '.' . $request->file('photo_a')->getClientOriginalExtension()
            ]);
        }

        if(!empty($request->file('photo_b')))
        {
            if(is_file(base_path('/public' . Features::find($id)->photo_b))) {
                unlink(base_path('/public' . Features::find($id)->photo_b));
            }
            $str = Str::random(10);
            $request->file('photo_b')->move(base_path() . '/public/img_features/', $str . '.' . $request->file('photo_b')->getClientOriginalExtension());

            Features::where('one_id', $request->one_id)->update([
                'photo_b' => '/img_features/' . $str . '.' . $request->file('photo_b')->getClientOriginalExtension()
            ]);
        }

        if(!empty($request->file('photo_c')))
        {
            if(is_file(base_path('/public' . Features::find($id)->photo_c))) {
                unlink(base_path('/public' . Features::find($id)->photo_c));
            }
            $str = Str::random(10);
            $request->file('photo_c')->move(base_path() . '/public/img_features/', $str . '.' . $request->file('photo_c')->getClientOriginalExtension());

            Features::where('one_id', $request->one_id)->update([
                'photo_c' => '/img_features/' . $str . '.' . $request->file('photo_c')->getClientOriginalExtension()
            ]);
        }

        return back();
    }
}
