<?php

namespace App\Http\Controllers;

use App\Word;
use Illuminate\Http\Request;

class WordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('lang.edit');
    }

    public function store(Request $request)
    {
        $array = array(
            '1' => 'ru',
            '2' => 'uz',
            '3' => 'en',
            '4' => 'isp',
            '5' => 'nem',
            '6' => 'kit',
            '7' => 'kor',
            '8' => 'yap',
        );
        for($i=1; $i<=8; $i++){
            Word::create([
                'key' => $request->get('key'),
                'translation' => $request->get('translation'),
                'lang' => $i,
            ]);
        }
        return back();
    }

    public function update(Request $request,$id)
    {
        // $data = Word::find($id)->created_at;
        //  Word::where('created_at', $data)->update([
        //      'key' => $request->get('key'),
        //  ]);
        //  Word::find($id)->update($request->all());
        
        Word::find($id)->update([
            'translation' => $request->get('translation'),
        ]);
        return back();
    }

    public function destroy($id)
    {
        Word::find($id)->delete();
        return back();
    }
}
