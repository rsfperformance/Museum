<?php

namespace App\Http\Controllers;

use App\Slayder;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SlayderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('slayder.data');
    }

    public function edit($id){
        $item = Slayder::where('one_id', $id)->first();
        // dd($item->header);
         return view('slayder.data', ['item' => $item]);
     }

    public function store(Request $request){
        $data = Slayder::create($request->all());

        if(!empty($request->file('photo')))
        {
            $str = Str::random(10);
            $request->file('photo')->move(base_path() . '/public/img_slayder/', $str . '.' . $request->file('photo')->getClientOriginalExtension());

            Slayder::find($data->id)->update([
                'photo' => '/img_slayder/' . $str . '.' . $request->file('photo')->getClientOriginalExtension()
            ]);
        }
        return back();
    }

    public function update(Request $request,$id){
        if(!empty($request->file('photo')))
        {
            if(is_file(base_path('/public' . Slayder::find($id)->photo))){
                unlink(base_path('/public' . Slayder::find($id)->photo));
            }
            $str = Str::random(10);
            $request->file('photo')->move(base_path() . '/public/img_slayder/', $str . '.' . $request->file('photo')->getClientOriginalExtension());
                
            Slayder::find($id)->update([
                        'photo' => '/img_slayder/' . $str . '.' . $request->file('photo')->getClientOriginalExtension()
                    ]);
        }

        return back();
    }

    public function destroy($id){
        if(is_file(base_path('/public' .Slayder::find($id)->photo))){
            unlink(base_path('/public' .Slayder::find($id)->photo));
        }
        Slayder::find($id)->delete();
        return back();
    }
}
