<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class PhotoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function index(){
        if (session()->get('locale') == '') {
            session()->put('locale', 'en');
            app()->setLocale('en');
        } else {
            app()->setLocale(session()->get('locale'));
        }
        $lan = session()->get('locale');
        return view('photo.all', ['lan' => $lan]);
    }

    public function create(){
        return view('photo.data');
    }

    public function show($loc, $oneid){
       $lan = $loc;
       $one_id = $oneid;
        return view('information.single', ['lan' => $lan, 'one_id' => $one_id]);
    }

    public function edit($id){
        $item = Information::where('one_id', $id)->first();
        // dd($item->header);
         return view('information.data', ['item' => $item]);
     }

    public function store(Request $request){
    
        $max = Photo::max('one_id')+1;

        // dd($request->header_a);
            foreach(\App\Lang::all() as $lan){
                 Photo::create([
                    'header_a' => $request->header_a[$lan->prefix],
                    'header_b' => $request->header_b[$lan->prefix],
                    'header_c' => $request->header_c[$lan->prefix],
                    'header_d' => $request->header_d[$lan->prefix],
                    'header_e' => $request->header_e[$lan->prefix],
                    'header_f' => $request->header_f[$lan->prefix],
                    'one_id' => $max,
                    'lang' => $lan->prefix,
                ]);
            }

            // dd($request->file('photo_aen'));

        if(!empty($request->file('photo_aen')))
        {
            $str = Str::random(10);
            $request->file('photo_aen')->move(base_path() . '/public/photo/', $str . '.' . $request->file('photo_aen')->getClientOriginalExtension());

            Photo::where('one_id', $max)->update([
                'photo_a' => '/photo/' . $str . '.' . $request->file('photo_aen')->getClientOriginalExtension()
            ]);
        }
        if(!empty($request->file('photo_ben')))
        {
            $str = Str::random(10);
            $request->file('photo_ben')->move(base_path() . '/public/photo/', $str . '.' . $request->file('photo_ben')->getClientOriginalExtension());

            Photo::where('one_id', $max)->update([
                'photo_b' => '/photo/' . $str . '.' . $request->file('photo_ben')->getClientOriginalExtension()
            ]);
        }
        if(!empty($request->file('photo_cen')))
        {
            $str = Str::random(10);
            $request->file('photo_cen')->move(base_path() . '/public/photo/', $str . '.' . $request->file('photo_cen')->getClientOriginalExtension());

            Photo::where('one_id', $max)->update([
                'photo_c' => '/photo/' . $str . '.' . $request->file('photo_cen')->getClientOriginalExtension()
            ]);
        }
        if(!empty($request->file('photo_den')))
        {
            $str = Str::random(10);
            $request->file('photo_den')->move(base_path() . '/public/photo/', $str . '.' . $request->file('photo_den')->getClientOriginalExtension());

            Photo::where('one_id', $max)->update([
                'photo_d' => '/photo/' . $str . '.' . $request->file('photo_den')->getClientOriginalExtension()
            ]);
        }
        if(!empty($request->file('photo_een')))
        {
            $str = Str::random(10);
            $request->file('photo_een')->move(base_path() . '/public/photo/', $str . '.' . $request->file('photo_een')->getClientOriginalExtension());

            Photo::where('one_id', $max)->update([
                'photo_e' => '/photo/' . $str . '.' . $request->file('photo_een')->getClientOriginalExtension()
            ]);
        }
        if(!empty($request->file('photo_fen')))
        {
            $str = Str::random(10);
            $request->file('photo_fen')->move(base_path() . '/public/photo/', $str . '.' . $request->file('photo_fen')->getClientOriginalExtension());

            Photo::where('one_id', $max)->update([
                'photo_f' => '/photo/' . $str . '.' . $request->file('photo_fen')->getClientOriginalExtension()
            ]);
        }
        return back();
    }

    public function update(Request $request,$id){
        $data = Photo::find($id);

        Photo::find($id)->update([
            'header_a' => $request->header_a,
            'header_b' => $request->header_b,
            'header_c' => $request->header_c,
            'header_d' => $request->header_d,
            'header_e' => $request->header_e,
            'header_f' => $request->header_f,
            'one_id' => $request->one_id,
            'lang' => $request->prefix,
        ]);

        if(!empty($request->file('photo_a')))
        {
            if(is_file(base_path('/public' . Photo::find($data->id)->photo_a))){
                unlink(base_path('/public' . Photo::find($data->id)->photo_a));
            }
            $str = Str::random(10);
            $request->file('photo_a')->move(base_path() . '/public/photo/', $str . '.' . $request->file('photo_a')->getClientOriginalExtension());

            Photo::where('one_id', $data->one_id)->update([
                'photo_a' => '/photo/' . $str . '.' . $request->file('photo_a')->getClientOriginalExtension()
            ]);
        }
        if(!empty($request->file('photo_b')))
        {
            if(is_file(base_path('/public' . Photo::find($data->id)->photo_b))){
                unlink(base_path('/public' . Photo::find($data->id)->photo_b));
            }
            $str = Str::random(10);
            $request->file('photo_b')->move(base_path() . '/public/photo/', $str . '.' . $request->file('photo_b')->getClientOriginalExtension());

            Photo::where('one_id', $data->one_id)->update([
                'photo_b' => '/photo/' . $str . '.' . $request->file('photo_b')->getClientOriginalExtension()
            ]);
        }
        if(!empty($request->file('photo_c')))
        {
            if(is_file(base_path('/public' . Photo::find($data->id)->photo_c)) != null) {
                unlink(base_path('/public' . Photo::find($data->id)->photo_c));
            }
            $str = Str::random(10);
            $request->file('photo_c')->move(base_path() . '/public/photo/', $str . '.' . $request->file('photo_c')->getClientOriginalExtension());

            Photo::where('one_id', $data->one_id)->update([
                'photo_c' => '/photo/' . $str . '.' . $request->file('photo_c')->getClientOriginalExtension()
            ]);
        }
        if(!empty($request->file('photo_d')))
        {
            if(is_file(base_path('/public' . Photo::find($data->id)->photo_d))) {
                unlink(base_path('/public' . Photo::find($data->id)->photo_d));
            }
            $str = Str::random(10);
            $request->file('photo_d')->move(base_path() . '/public/photo/', $str . '.' . $request->file('photo_d')->getClientOriginalExtension());

            Photo::where('one_id', $data->one_id)->update([
                'photo_d' => '/photo/' . $str . '.' . $request->file('photo_d')->getClientOriginalExtension()
            ]);
        }
        if(!empty($request->file('photo_e')))
        {
            if(is_file(base_path('/public' . Photo::find($data->id)->photo_e))) {
                unlink(base_path('/public' . Photo::find($data->id)->photo_e));
            }
            $str = Str::random(10);
            $request->file('photo_e')->move(base_path() . '/public/photo/', $str . '.' . $request->file('photo_e')->getClientOriginalExtension());

            Photo::where('one_id', $data->one_id)->update([
                'photo_e' => '/photo/' . $str . '.' . $request->file('photo_e')->getClientOriginalExtension()
            ]);
        }
        if(!empty($request->file('photo_f')))
        {
            if(is_file(base_path('/public' . Photo::find($data->id)->photo_f))) {
                unlink(base_path('/public' . Photo::find($data->id)->photo_f));
            }
            $str = Str::random(10);
            $request->file('photo_f')->move(base_path() . '/public/photo/', $str . '.' . $request->file('photo_f')->getClientOriginalExtension());

            Photo::where('one_id', $data->one_id)->update([
                'photo_f' => '/photo/' . $str . '.' . $request->file('photo_f')->getClientOriginalExtension()
            ]);
        }

        return back();

    }
    public function destroy($id){
        foreach(Photo::where('one_id', $id)->get() as $data){
            if(Photo::find($data->id)->photo_a != null && is_file(base_path('/public' . Photo::find($data->id)->photo_a))){
                unlink(base_path('/public' . Photo::find($data->id)->photo_a));
            }
            if(Photo::find($data->id)->photo_b != null && is_file(base_path('/public' . Photo::find($data->id)->photo_b))){
                unlink(base_path('/public' . Photo::find($data->id)->photo_b));
            }
            if(Photo::find($data->id)->photo_c != null && is_file(base_path('/public' . Photo::find($data->id)->photo_c))){
                unlink(base_path('/public' . Photo::find($data->id)->photo_c));
            }
            if(Photo::find($data->id)->photo_d != null && is_file(base_path('/public' . Photo::find($data->id)->photo_d))){
                unlink(base_path('/public' . Photo::find($data->id)->photo_d));
            }
            if(Photo::find($data->id)->photo_e != null && is_file(base_path('/public' . Photo::find($data->id)->photo_e))){
                unlink(base_path('/public' . Photo::find($data->id)->photo_e));
            }
            if(Photo::find($data->id)->photo_f != null && is_file(base_path('/public' . Photo::find($data->id)->photo_f))){
                unlink(base_path('/public' . Photo::find($data->id)->photo_f));
            }
        }
        Photo::where('one_id', $id)->delete();
        return back();
     }
}
