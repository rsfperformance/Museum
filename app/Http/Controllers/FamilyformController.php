<?php

namespace App\Http\Controllers;

use App\Familyform;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class FamilyformController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }
    public function index(){
        return view('familyform.data');
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
        return view('familyform.single', ['lan' => $lan, 'one_id' => $one_id,]);
    }

    public function edit($id){
        $item = Familyform::where('one_id', $id)->first();
        // dd($item->header);
        return view('familyform.data', ['item' => $item]);
    }

    public function store(Request $request){
    
            $data = Familyform::create($request->all());
        
            if(!empty($request->file('link')))
            {    
                Familyform::where('one_id', $data->one_id)->update([
                    'link' => $request->get('link'),
                ]);
            }
        
        if(!empty($request->file('photo')))
        {
            $str = Str::random(10);
            $request->file('photo')->move(base_path() . '/public/img_familyform/', $str . '.' . $request->file('photo')->getClientOriginalExtension());

            Familyform::find($data->id)->update([
                'photo' => '/img_familyform/' . $str . '.' . $request->file('photo')->getClientOriginalExtension()
            ]);
        }
        return back();
    }

    public function update(Request $request,$id){
        $value = array_except($request->all(), ['photo']);
        Familyform::find($id)->update($value);

        if(!empty($request->link))
            {    
                Familyform::where('one_id', $request->one_id)->update([
                    'link' => $request->get('link'),
                ]);
            }
        
        if(!empty($request->file('photo')))
        {
            if(is_file(base_path('/public' . Familyform::find($id)->photo))) {
                unlink(base_path('/public' . Familyform::find($id)->photo));
            }

            $str = Str::random(10);
            $request->file('photo')->move(base_path() . '/public/img_familyform/', $str . '.' . $request->file('photo')->getClientOriginalExtension());

            Familyform::where('one_id', $request->one_id)->update([
                'photo' => '/img_familyform/' . $str . '.' . $request->file('photo')->getClientOriginalExtension()
            ]);
        }
        return back();

        return back();
    }
}
