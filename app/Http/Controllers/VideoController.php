<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function create(){
        return view('video.data');
    }

    public function index()
    {
        if (session()->get('locale') == '') {
            session()->put('locale', 'en');
            app()->setLocale('en');
        } else {
            app()->setLocale(session()->get('locale'));
        }
        $lan = session()->get('locale');
        return view('video.all', ['lan' => $lan]);
    }

    public function store(Request $request){
        Video::create($request->all());

        return back();
    }

    public function update(Request $request,$id){
        Video::find($id)->update($request->all());

        // $request->session()->push('key', History::where('one_id', $request->one_id)->get('id'));
        // dd($request->session()->get('i'));

        if(!empty($request->file('photo')))
        {
            $str = Str::random(10);
            $request->file('photo')->move(base_path() . '/public/img_useful/', $str . '.' . $request->file('photo')->getClientOriginalExtension());
                
            Useful::where('one_id', $request->one_id)->update([
                        'photo' => '/img_useful/' . $str . '.' . $request->file('photo')->getClientOriginalExtension()
                    ]);
        }

        return back();
    }
    public function destroy($id){
        Video::find($id)->delete();
        return back();
    }
}
