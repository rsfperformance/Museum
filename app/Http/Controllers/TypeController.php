<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }
    public function index(){
        return view('type.data');
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
        return view('type.single', ['one_id' => $one_id, 'lan' => $lan,]);
        }

    public function edit($id){
        $item = Type::where('one_id', $id)->first();
        // dd($item->header);
        return view('type.data', ['item' => $item]);
        }

    public function store(Request $request){
        for($i=1; $i<=8; $i++){
            $data = Type::create($request->all());
        }

        if(!empty($request->file('photo_a')))
        {
            $str = Str::random(10);
            $request->file('photo_a')->move(base_path() . '/public/img_type/', $str . '.' . $request->file('photo_a')->getClientOriginalExtension());

            Type::find($data->id)->update([
                'photo_a' => '/img_type/' . $str . '.' . $request->file('photo_a')->getClientOriginalExtension()
            ]);
        }
        if(!empty($request->file('photo_b')))
        {
            $str = Str::random(10);
            $request->file('photo_b')->move(base_path() . '/public/img_type/', $str . '.' . $request->file('photo_b')->getClientOriginalExtension());

            Type::find($data->id)->update([
                'photo_b' => '/img_type/' . $str . '.' . $request->file('photo_b')->getClientOriginalExtension()
            ]);
        }
        if(!empty($request->file('photo_C')))
        {
            $str = Str::random(10);
            $request->file('photo_C')->move(base_path() . '/public/img_type/', $str . '.' . $request->file('photo_C')->getClientOriginalExtension());

            Type::find($data->id)->update([
                'photo_C' => '/img_type/' . $str . '.' . $request->file('photo_C')->getClientOriginalExtension()
            ]);
        }
        return back();
    }

    public function update(Request $request,$id){
        $value = array_except($request->all(), ['photo_a','photo_b','photo_c']);
        Type::find($id)->update($value);
        // $request->session()->push('key', History::where('one_id', $request->one_id)->get('id'));
        // dd($request->session()->get('i'));
        
            Type::where('one_id', $request->one_id)->update([
                'link' => $request->link,
            ]);
        if(!empty($request->file('photo_a')))
        {
            if(is_file(base_path('/public' . Type::find($id)->photo_a))){
                unlink(base_path('/public' . Type::find($id)->photo_a));
            }
            $str = Str::random(10);
            $request->file('photo_a')->move(base_path() . '/public/img_type/', $str . '.' . $request->file('photo_a')->getClientOriginalExtension());
                
            Type::where('one_id', $request->one_id)->update([
                        'photo_a' => '/img_type/' . $str . '.' . $request->file('photo_a')->getClientOriginalExtension()
                    ]);
        }

        if(!empty($request->file('photo_b')))
        {
            if(is_file(base_path('/public' . Type::find($id)->photo_b))){
                unlink(base_path('/public' . Type::find($id)->photo_b));
            }
            $str = Str::random(10);
            $request->file('photo_b')->move(base_path() . '/public/img_type/', $str . '.' . $request->file('photo_b')->getClientOriginalExtension());

            Type::where('one_id', $request->one_id)->update([
                'photo_b' => '/img_type/' . $str . '.' . $request->file('photo_b')->getClientOriginalExtension()
            ]);
        }

        if(!empty($request->file('photo_c')))
        {
            if(is_file(base_path('/public' . Type::find($id)->photo_c))){
                unlink(base_path('/public' . Type::find($id)->photo_c));
            }
            $str = Str::random(10);
            $request->file('photo_c')->move(base_path() . '/public/img_type/', $str . '.' . $request->file('photo_c')->getClientOriginalExtension());

            Type::where('one_id', $request->one_id)->update([
                'photo_c' => '/img_type/' . $str . '.' . $request->file('photo_c')->getClientOriginalExtension()
            ]);
        }

        return back();
    }
}
