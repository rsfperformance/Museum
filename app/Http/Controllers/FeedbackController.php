<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feedback;

class FeedbackController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        Feedback::where('view', 0)->update([
            'view' => 1
        ]);
        return view('feedback.data');
    }
    public function store(Request $request)
    {
        Feedback::create($request->all());
        return back();
    }

    public function nova()
    {
        return view('nova.novas');
    }

    public function destroy($id)
    {
        Feedback::find($id)->delete();
        return back();
    }
}
