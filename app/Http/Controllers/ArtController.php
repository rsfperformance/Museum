<?php

namespace App\Http\Controllers;

use App\Art;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ArtController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show', 'index');
    }

    public function index(){
        if (session()->get('locale') == '') {
            session()->put('locale', 'en');
            app()->setLocale('en');
        } else {
            app()->setLocale(session()->get('locale'));
        }
        $lan = session()->get('locale');
        return view('art.all', ['lan' => $lan]);
    }

    public function edit($id)
    {
        $type = $id;
        return view('art.data', ['type' => $type]);
    }

    public function create(){
        return view('art.data');
    }

    public function store(Request $request){
        $max = Art::max('one_id')+1;
            foreach(\App\Lang::all() as $lan){
                $data = Art::create([
                    'header' => $request->header[$lan->prefix],
                    'one_id' => $max,
                    'type' => $request->get('type'),
                    'lang' => $lan->prefix,
                ]);
            } 

        if(!empty($request->file('photo')))
        {
            $str = Str::random(10);
            $request->file('photo')->move(base_path() . '/public/art/', $str . '.' . $request->file('photo')->getClientOriginalExtension());

            Art::where('one_id', $max)->update([
                'photo' => '/art/' . $str . '.' . $request->file('photo')->getClientOriginalExtension()
            ]);
        }
        
        return back();
    }

    public function update(Request $request,$id){

        $data = Art::find($id);
         Art::find($id)->update([
             'header' => $request->header,
             'one_id' => $request->one_id,
             'type' => $request->type,
             'lang' => $request->lang,
         ]);


        if(!empty($request->file('photo')))
        {
            if(is_file(base_path('/public' . Art::find($data->id)->photo))){
                unlink(base_path('/public' . Art::find($data->id)->photo));
            }
            $str = Str::random(10);
            $request->file('photo')->move(base_path() . '/public/art/', $str . '.' . $request->file('photo')->getClientOriginalExtension());

            Art::where('one_id', $request->one_id)->update([
                'photo' => '/art/' . $str . '.' . $request->file('photo')->getClientOriginalExtension()
            ]);
        }

        return back();
    }

    public function destroy($id)
    {
        $data = Art::find($id);

        if(is_file(base_path('/public' . Art::find($data->id)->photo))){
            unlink(base_path('/public' . Art::find($data->id)->photo));
        }

        Art::where('one_id', $data->one_id)->delete();
        return back();
    }
}
