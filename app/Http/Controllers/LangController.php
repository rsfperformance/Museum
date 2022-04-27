<?php

namespace App\Http\Controllers;

use App\Lang;
use Illuminate\Http\Request;

class LangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('lang.data');
    }

    public function store(Request $request)
    {
        Lang::create($request->all());
        return back();
    }

    public function edit($id)
    {
        $data = $id;
        return view('lang.edit', ['data' => $data]);
    }

    public function update(Request $request,$id)
    {
        Lang::find($id)->update($request->all());
        return back();
    }
}
