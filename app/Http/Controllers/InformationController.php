<?php

namespace App\Http\Controllers;

use App\Information;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }
    public function index(){
        return view('information.data');
    }

    public function show($oneid){
        if (session()->get('locale') == '') {
            session()->put('locale', 'en');
            app()->setLocale('en');
        } else {
            app()->setLocale(session()->get('locale'));
        }
        $lan = session()->get('locale');
        $type = $oneid;
        return view('information.single', ['lan' => $lan, 'type' => $type]);
    }

    public function edit($id){
      if(Information::where('type', $id)->first()){
        $item = Information::where('type', $id)->first();
      }else{
      $item = $id;
      }
        // dd($item->header);
         return view('information.data', ['item' => $item]);
     }

    public function store(Request $request){
        $max = Information::max('one_id')+1;
            foreach(\App\Lang::all() as $lan){
                $data = Information::create([
                    'header' => $request->header[$lan->prefix],
                    'one_id' => $max,
                    'type' => $request->get('type'),
                    'lang' => $lan->prefix,
                ]);
            }

        if(!empty($request->file('file')))
        {
            $str = Str::random(10);
            $request->file('file')->move(base_path() . '/public/file/', $str . '.' . $request->file('file')->getClientOriginalExtension());

            Information::where('one_id', $max)->update([
                'file' => '/file/' . $str . '.' . $request->file('file')->getClientOriginalExtension()
            ]);
        }
        
        return back();
    }

    public function update(Request $request,$id){
        $data = Information::find($id);
        $value = array_except($request->all(), ['file']);
        Information::find($id)->update($value);

        if(!empty($request->file('file')))
        {
            if(is_file(base_path('/public' . $data->file))){
                unlink(base_path('/public' . $data->file));
            }
            $str = Str::random(10);
            $request->file('file')->move(base_path() . '/public/file/', $str . '.' . $request->file('file')->getClientOriginalExtension());

            Information::find($id)->update([
                'file' => '/file/' . $str . '.' . $request->file('file')->getClientOriginalExtension()
            ]);
        }

        return back();
    }

    public function destroy($id)
    {
        $data = Information::find($id);
        if(is_file(base_path('/public' . $data->file))){
            unlink(base_path('/public' . $data->file));
        }
        Information::where('one_id', $data->one_id)->delete();
        return back();
    }
}
