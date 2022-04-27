<?php

namespace App\Http\Controllers;

use App\About;
use App\Lang;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function indexadmin(){
        
        return view('about.data');
    }

    public function index(){
        if (session()->get('locale') == '') {
            session()->put('locale', 'en');
            app()->setLocale('en');
        } else {
            app()->setLocale(session()->get('locale'));
        }
        $lan = session()->get('locale');
        return view('about.single', ['lan' => $lan]);
    }

    public function show(){
        if (session()->get('locale') == '') {
            session()->put('locale', 'en');
            app()->setLocale('en');
        } else {
            app()->setLocale(session()->get('locale'));
        }
        $lan = session()->get('locale');
        return view('about.single', ['lan' => $lan]);
    }


    public function store(Request $request){
       
            $data = About::create($request->all());
      
        
        if(!empty($request->file('photo')))
        {
            $str = Str::random(10);
            $request->file('photo')->move(base_path() . '/public/img_about/', $str . '.' . $request->file('photo')->getClientOriginalExtension());

            About::find($data->id)->update([
                'photo' => '/img_about/' . $str . '.' . $request->file('photo')->getClientOriginalExtension()
            ]);
        }
        return back();
    }

    public function update(Request $request,$id)
    {
        $data = About::find($id);
        $value = array_except($request->all(), ['photo_a', 'photo_b', 'photo_c', 'photo_d', 'photo_e', 'photo_f']);
        About::find($id)->update($value);

        $v = About::find($id)->visitors;

        foreach(\App\Lang::all() as $data){
            if (!empty($request->get('visitors'))) {
                About::where('lang', $data->prefix)->update([
                    'visitors' => $request->get('visitors'),
                    'photonumb' => $request->get('photonumb'),
                ]);
            }
        }

            if(!empty($request->file('photo_a')))
            {
               if(is_file(base_path('/public' . About::find($data->id)->photo_a))) {
                   unlink(base_path('/public' . About::find($data->id)->photo_a));
               }
                $str = Str::random(10);
                $request->file('photo_a')->move(base_path() . '/public/img_about/', $str . '.' . $request->file('photo_a')->getClientOriginalExtension());
                    
                About::where('visitors', $v)->update([
                            'photo_a' => '/img_about/' . $str . '.' . $request->file('photo_a')->getClientOriginalExtension()
                        ]);
            }

            if(!empty($request->file('photo_b')))
            {
                if(is_file(base_path('/public' . About::find($data->id)->photo_b))) {
                    unlink(base_path('/public' . About::find($data->id)->photo_b));
                }
                $str = Str::random(10);
                $request->file('photo_b')->move(base_path() . '/public/img_about/', $str . '.' . $request->file('photo_b')->getClientOriginalExtension());

                About::where('visitors', $v)->update([
                    'photo_b' => '/img_about/' . $str . '.' . $request->file('photo_b')->getClientOriginalExtension()
                ]);
            }

            if(!empty($request->file('photo_c')))
            {
                if(is_file(base_path('/public' . About::find($data->id)->photo_c))) {
                    unlink(base_path('/public' . About::find($data->id)->photo_c));
                }
                $str = Str::random(10);
                $request->file('photo_c')->move(base_path() . '/public/img_about/', $str . '.' . $request->file('photo_c')->getClientOriginalExtension());

                About::where('visitors', $v)->update([
                    'photo_c' => '/img_about/' . $str . '.' . $request->file('photo_c')->getClientOriginalExtension()
                ]);
            }

            if(!empty($request->file('photo_d')))
            {
                if(is_file(base_path('/public' . About::find($data->id)->photo_d))) {
                    unlink(base_path('/public' . About::find($data->id)->photo_d));
                }
                $str = Str::random(10);
                $request->file('photo_d')->move(base_path() . '/public/img_about/', $str . '.' . $request->file('photo_d')->getClientOriginalExtension());

                About::where('visitors', $v)->update([
                    'photo_d' => '/img_about/' . $str . '.' . $request->file('photo_d')->getClientOriginalExtension()
                ]);
            }
            
            if(!empty($request->file('photo_e')))
            {
                if(is_file(base_path('/public' . About::find($data->id)->photo_e))) {
                    unlink(base_path('/public' . About::find($data->id)->photo_e));
                }
                $str = Str::random(10);
                $request->file('photo_e')->move(base_path() . '/public/img_about/', $str . '.' . $request->file('photo_e')->getClientOriginalExtension());

                About::where('visitors', $v)->update([
                    'photo_e' => '/img_about/' . $str . '.' . $request->file('photo_e')->getClientOriginalExtension()
                ]);
            }

            if(!empty($request->file('photo_f')))
            {
                if(is_file(base_path('/public' . About::find($data->id)->photo_f))) {
                    unlink(base_path('/public' . About::find($data->id)->photo_f));
                }
                $str = Str::random(10);
                $request->file('photo_f')->move(base_path() . '/public/img_about/', $str . '.' . $request->file('photo_f')->getClientOriginalExtension());

                About::where('visitors', $v)->update([
                    'photo_f' => '/img_about/' . $str . '.' . $request->file('photo_f')->getClientOriginalExtension()
                ]);
            }
        return back();
    }
}
