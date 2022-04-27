<?php
$arr = [];
foreach(App\Lang::where('prefix', 'uz')->get() as $lang){
    foreach (\App\Word::where('lang', $lang->id)->get() as $data) {
        $arr[$data->key] = $data->translation;
    }
}

return $arr;