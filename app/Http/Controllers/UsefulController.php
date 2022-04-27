<?php

namespace App\Http\Controllers;

use App\Useful;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UsefulController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show', 'showall');
    }

    public function index(){
        return view('useful.data');
    }

    public function show($id)
    {
        if (session()->get('locale') == '') {
            session()->put('locale', 'en');
            app()->setLocale('en');
        } else {
            app()->setLocale(session()->get('locale'));
        }
        $lan = session()->get('locale');
        $item = [];
        foreach(Useful::where('one_id', $id)->get() as $data){
            $item[$data->lang] = $data;
        }
        // dd($item);
        return view('useful.single', ['item' => $item, 'lan' => $lan]);
    }

    public function showall($oneid){
        if (session()->get('locale') == '') {
            session()->put('locale', 'en');
            app()->setLocale('en');
        } else {
            app()->setLocale(session()->get('locale'));
        }
        $type = $oneid;
        $lan = session()->get('locale');
        return view('useful.all', ['lan' => $lan, 'type' => $type]);
    }

    public function edit($id){
        $item = Useful::where('type', $id)->first();
        if(isset($item)){
            $item = $item;
        }else{
            $item = $id;
        }
        // dd($item->header);
         return view('useful.data', ['item' => $item]);
     }

     public function send($data){ 
        //  dd($data['link']);
        foreach(\App\Subscription::where('active', 1)->get() as $value) {
            $to_email = $value->mail;
            \Illuminate\Support\Facades\Mail::send('mail.mail', ['data' => $data], function ($message) use ($to_email) {
                $message->from('ravshanovsamir@gmail.com', 'Museum');
                $message->to($to_email)->subject('Сообщение');                
            });
        }
        return back();
    }

    public function store(Request $request){

          $max = Useful::max('one_id')+1;
          foreach(\App\Lang::all() as $l){
              if(isset($request->description[$l->prefix])){
                    Useful::create([
                        'type' => $request->get('type'),
                        'one_id' => $max,
                        'header' => $request->header[$l->prefix],
                        'description' => $request->description[$l->prefix],
                        'link' => $request->get('link'),
                        'lang' => $l->prefix,
                    ]);
              }else{
                  Useful::create([
                      'type' => $request->get('type'),
                      'one_id' => $max,
                      'header' => $request->header[$l->prefix],
                      'link' => $request->get('link'),
                      'lang' => $l->prefix,
                  ]);
              }
          }

        if(!empty($request->file('photo')))
        {
            $str = Str::random(10);
            $request->file('photo')->move(base_path() . '/public/img_useful/', $str . '.' . $request->file('photo')->getClientOriginalExtension());

            Useful::where('one_id', $max)->update([
                'photo' => '/img_useful/' . $str . '.' . $request->file('photo')->getClientOriginalExtension()
            ]);
        }
        // $message = $request->header['en'],
        // $link = env('APP_URL');
        
        $data = [];
        $data = [
            'message' => $request->header['en'],
            'link' => '127.0.0.1',
            'id' => $max,
        ];
        
         $this->send($data);
        return back();
    }

    public function update(Request $request,$id){
        $value = array_except($request->all(), ['photo']);
        Useful::find($id)->update($value);
        $data = Useful::find($id);
        Useful::where('one_id', $data->one_id)->update([
            'link' => $request->get('link'),
        ]);
        if(!empty($request->file('photo')))
        {
            if(is_file(base_path('/public' . Useful::find($id)->photo))){
                unlink(base_path('/public' . Useful::find($id)->photo));
            }
            $str = Str::random(10);
            $request->file('photo')->move(base_path() . '/public/img_useful/', $str . '.' . $request->file('photo')->getClientOriginalExtension());
                
            Useful::where('one_id', $data->one_id)->update([
                'photo' => '/img_useful/' . $str . '.' . $request->file('photo')->getClientOriginalExtension()
            ]);
        }

        return back();
    }

    public function destroy($id){
        if(is_file(base_path('/public' . Useful::find($id)->photo))){
            unlink(base_path('/public' . Useful::find($id)->photo));
        }
        Useful::where('one_id', Useful::find($id)->one_id)->delete();
        return back();
    }
   
}
