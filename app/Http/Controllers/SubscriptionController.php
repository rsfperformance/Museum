<?php

namespace App\Http\Controllers;

use App\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index()
    {
        Subscription::where('view', 1)->update([
            'view' => 0
        ]);
        return view('subscription.index');
    }

    public function store(Request $request)
    {
        Subscription::create($request->all());
        return back();
    }

    public function destroy($id)
    {
        Subscription::find($id)->delete();
        return back();
    }
}
