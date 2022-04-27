<?php

namespace App\Http\Controllers;

use App\Family;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show', 'indexall');
    }
    public function index(){
        return view('family.data');
    }

    public function indexall(){
        if (session()->get('locale') == '') {
            session()->put('locale', 'en');
            app()->setLocale('en');
        } else {
            app()->setLocale(session()->get('locale'));
        }
        $lan = session()->get('locale');
        return view('family.familyall', ['lan'=>$lan]);
    }

    public function show($id){
        if (session()->get('locale') == '') {
            session()->put('locale', 'en');
            app()->setLocale('en');
        } else {
            app()->setLocale(session()->get('locale'));
        }
        $lan = session()->get('locale');
       $item = $id;
    //    dd($item->one_id);
        return view('family.single', ['item' => $item, 'lan' => $lan]);
    }

    public function edit($id){
        $item = Family::where('one_id', $id)->first();
        // dd($item->header);
         return view('family.data', ['item' => $item]);
     }

    public function store(Request $request){
        $max = Family::max('one_id')+1;
          foreach(\App\Lang::all() as $lan){
            Family::create([
                'header' => $request->header[$lan->prefix],
                'type_of_cerimony' => $request->type_of_cerimony[$lan->prefix],
                'description_a' => $request->description_a[$lan->prefix],
                'description_b' => $request->description_b[$lan->prefix],
                'description_c' => $request->description_c[$lan->prefix],
                'description_b2' => $request->description_b2[$lan->prefix],
                'description_c2' => $request->description_c2[$lan->prefix],
                'description_d' => $request->description_d[$lan->prefix],
                'one_id' => $max,
                'link' => $request->get('link'),
                'lang' => $lan->prefix,
            ]);
          }

        //  dd($request->file('photo_aen'));
        if(!empty($request->file('photo_aen')))
        {
            $str = Str::random(10);
            $request->file('photo_aen')->move(base_path() . '/public/img_family/', $str . '.' . $request->file('photo_aen')->getClientOriginalExtension());

            Family::where('one_id', $max)->update([
                'photo_a' => '/img_family/' . $str . '.' . $request->file('photo_aen')->getClientOriginalExtension()
            ]);
        }
        if(!empty($request->file('photo_ben')))
        {
            $str = Str::random(10);
            $request->file('photo_ben')->move(base_path() . '/public/img_family/', $str . '.' . $request->file('photo_ben')->getClientOriginalExtension());

            Family::where('one_id', $max)->update([
                'photo_b' => '/img_family/' . $str . '.' . $request->file('photo_ben')->getClientOriginalExtension()
            ]);
        }

        if(!empty($request->file('photo_cen')))
        {
            $str = Str::random(10);
            $request->file('photo_cen')->move(base_path() . '/public/img_family/', $str . '.' . $request->file('photo_cen')->getClientOriginalExtension());

            Family::where('one_id', $max)->update([
                'photo_c' => '/img_family/' . $str . '.' . $request->file('photo_cen')->getClientOriginalExtension()
            ]);
        }
        if(!empty($request->file('photo_b2en')))
        {
            $str = Str::random(10);
            $request->file('photo_b2en')->move(base_path() . '/public/img_family/', $str . '.' . $request->file('photo_b2en')->getClientOriginalExtension());

            Family::where('one_id', $max)->update([
                'photo_b2' => '/img_family/' . $str . '.' . $request->file('photo_b2en')->getClientOriginalExtension()
            ]);
        }

        if(!empty($request->file('photo_c2en')))
        {
            $str = Str::random(10);
            $request->file('photo_c2en')->move(base_path() . '/public/img_family/', $str . '.' . $request->file('photo_c2en')->getClientOriginalExtension());

            Family::where('one_id', $max)->update([
                'photo_c2' => '/img_family/' . $str . '.' . $request->file('photo_c2en')->getClientOriginalExtension()
            ]);
        }

        if(!empty($request->file('photo_d')))
        {
            $str = Str::random(10);
            $request->file('photo_d')->move(base_path() . '/public/img_family/', $str . '.' . $request->file('photo_d')->getClientOriginalExtension());

            Family::where('one_id', $max)->update([
                'photo_d' => '/img_family/' . $str . '.' . $request->file('photo_d')->getClientOriginalExtension()
            ]);
        }
        return back();
    }

    public function update(Request $request,$id){
        $value = array_except($request->all(), ['photo_a', 'photo_b', 'photo_c', 'photo_b2', 'photo_c2', 'photo_d']);

        Family::find($id)->update($value);

        $data = Family::find($id);

        if(!empty($request->file('photo_a')))
        {
            if(is_file(base_path('/public' . Family::find($data->id)->photo_a))) {
                unlink(base_path('/public' . Family::find($data->id)->photo_a));
            }
            $str = Str::random(10);
            $request->file('photo_a')->move(base_path() . '/public/img_family/', $str . '.' . $request->file('photo_a')->getClientOriginalExtension());

            Family::where('one_id', $data->one_id)->update([
                'photo_a' => '/img_family/' . $str . '.' . $request->file('photo_a')->getClientOriginalExtension()
            ]);
        }

        if(!empty($request->file('photo_b')))
        {
            if(is_file(base_path('/public' . Family::find($data->id)->photo_b))) {
                unlink(base_path('/public' . Family::find($data->id)->photo_b));
            }
            $str = Str::random(10);
            $request->file('photo_b')->move(base_path() . '/public/img_family/', $str . '.' . $request->file('photo_b')->getClientOriginalExtension());

            Family::where('one_id', $data->one_id)->update([
                'photo_b' => '/img_family/' . $str . '.' . $request->file('photo_b')->getClientOriginalExtension()
            ]);
        }

        if(!empty($request->file('photo_c')))
        {
            if(is_file(base_path('/public' . Family::find($data->id)->photo_c))) {
                unlink(base_path('/public' . Family::find($data->id)->photo_c));
            }
            $str = Str::random(10);
            $request->file('photo_c')->move(base_path() . '/public/img_family/', $str . '.' . $request->file('photo_c')->getClientOriginalExtension());

            Family::where('one_id', $data->one_id)->update([
                'photo_c' => '/img_family/' . $str . '.' . $request->file('photo_c')->getClientOriginalExtension()
            ]);
        }

        if(!empty($request->file('photo_b2')))
        {
            if(is_file(base_path('/public' . Family::find($data->id)->photo_b))) {
                unlink(base_path('/public' . Family::find($data->id)->photo_b));
            }
            $str = Str::random(10);
            $request->file('photo_b2')->move(base_path() . '/public/img_family/', $str . '.' . $request->file('photo_b2')->getClientOriginalExtension());

            Family::where('one_id', $data->one_id)->update([
                'photo_b2' => '/img_family/' . $str . '.' . $request->file('photo_b2')->getClientOriginalExtension()
            ]);
        }

        if(!empty($request->file('photo_c2')))
        {
            if(is_file(base_path('/public' . Family::find($data->id)->photo_c2))) {
                unlink(base_path('/public' . Family::find($data->id)->photo_c2));
            }
            $str = Str::random(10);
            $request->file('photo_c2')->move(base_path() . '/public/img_family/', $str . '.' . $request->file('photo_c2')->getClientOriginalExtension());

            Family::where('one_id', $data->one_id)->update([
                'photo_c2' => '/img_family/' . $str . '.' . $request->file('photo_c2')->getClientOriginalExtension()
            ]);
        }
        if(!empty($request->file('photo_d')))
        {
            if(is_file(base_path('/public' . Family::find($data->id)->photo_d))) {
                unlink(base_path('/public' . Family::find($data->id)->photo_d));
            }
            $str = Str::random(10);
            $request->file('photo_d')->move(base_path() . '/public/img_family/', $str . '.' . $request->file('photo_d')->getClientOriginalExtension());

            Family::where('one_id', $data->one_id)->update([
                'photo_d' => '/img_family/' . $str . '.' . $request->file('photo_d')->getClientOriginalExtension()
            ]);
        }

        return back();
    }

    public function destroy($id)
    {
        Family::where('one_id', $id)->delete();
        return back();
    }
}
