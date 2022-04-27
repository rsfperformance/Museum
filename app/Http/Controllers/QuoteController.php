<?php

namespace App\Http\Controllers;

use App\Quote;
use Faker\Provider\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    public function index(){
        return view('quote.data');
    }


    public function store(Request $request){

    $max= Quote::max('one_id')+1;
    
        foreach(\App\Lang::all() as $lan){
            $data = Quote::create([
                'author' => $request->author[$lan->prefix],
                'quote' => $request->quote[$lan->prefix],
                'one_id' => $max,
                'lang' => $lan->prefix,
            ]);
        }

        if(!empty($request->file('photoen')))
        {
            $str = Str::random(10);
            $request->file('photoen')->move(base_path() . '/public/img_quote/', $str . '.' . $request->file('photoen')->getClientOriginalExtension());

            Quote::where('one_id', $max)->update([
                'photo' => '/img_quote/' . $str . '.' . $request->file('photoen')->getClientOriginalExtension()
            ]);
        }
    
        return back();
    }

    public function update(Request $request,$id){
        $value = array_except($request->all(), ['photo']);
        Quote::find($id)->update($value);
        $data = Quote::find($id);
        
        if(!empty($request->file('photo')))
        {
            if(is_file(base_path('/public' . Quote::find($data->id)->photo))) {
                unlink(base_path('/public' . Quote::find($data->id)->photo));
            }
            $str = Str::random(10);
            $request->file('photo')->move(base_path() . '/public/img_quote/', $str . '.' . $request->file('photo')->getClientOriginalExtension());

            Quote::where('one_id', $data->one_id)->update([
                'photo' => '/img_quote/' . $str . '.' . $request->file('photo')->getClientOriginalExtension()
            ]);
        }
        return back();
    }

    public function destroy($id){
        $data = Quote::find($id);
        if(is_file(base_path('/public' . Quote::find($id)->photo))) {
            unlink(base_path('/public' . Quote::find($id)->photo));
        }
        Quote::where('one_id', $data->one_id)->delete();
        return back();
    }
}
