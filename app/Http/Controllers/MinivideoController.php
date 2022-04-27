<?php

namespace App\Http\Controllers;

use App\Minivideo;
use Illuminate\Http\Request;

class MinivideoController extends Controller
{
    public function index()
    {
        return view('minivideo.data');
    }

    public function store(Request $request)
    {
        Minivideo::create($request->all());
        return back();
    }

    public function update(Request $request, $id)
    {
        Minivideo::find($id)->update($request->all());
        return back();
    }

    public function destroy($id)
    {
        Minivideo::find($id)->delete();
        return back();
    }
}
