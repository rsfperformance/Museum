<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $guarded = [];

    public function send($data){ 
        foreach(\App\Subscription::where('active', 1)->get() as $value) {
            $to_email = $value->mail;
            \Illuminate\Support\Facades\Mail::send('mail.mail', $data, function ($message) use ($to_email) {
                $message->from('ravshanovsamir@gmail.com', 'PelikanPost');
                $message->to($to_email)->subject('Сообщение');                
            });
        }
    }
}
