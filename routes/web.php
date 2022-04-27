<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if (session()->get('locale') == '') {
        session()->put('locale', 'en');
        app()->setLocale('en');
    } else {
        app()->setLocale(session()->get('locale'));
    }
    $lan = session()->get('locale');
    $view = \App\About::find(1)->visitors;
    foreach(\App\Lang::all() as $data){
        \App\About::where('lang', $data->prefix)->update([
            'visitors' => $view + 1,
        ]);
    }
    return view('welcome', compact('lan'));
});

// Route::get('/languages/{loc}', function ($loc) {
//     $lan = $loc;
//     if (session()->get('locale') != '') {
//         app()->setLocale(session()->get('locale'));
//     } 
//     // $lang = session()->get('locale');
//     return view('welcome', compact('lan'));
// });

Route::get('/languages/{loc}', function ($loc){
    foreach(\App\Lang::all() as $lang){
        $l[] = $lang->prefix;
    }

    if (in_array($loc, $l)) {
        session()->put('locale', $loc);
    } else {
        session()->put('locale', 'en');
    }
    return redirect()->back();
});

Auth::routes();


Route::delete('/deletetrach', 'PhotoController@deletetrash');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/ip', 'AboutController@getIp');

// Route::get('/wordd', function(){
//     $arr = [];
//     foreach(App\Lang::where('prefix', 'en')->get() as $lang){
//         foreach(\App\Word::where('lang', $lang->id)->get() as $data) {
//             $arr[$data->key] = $data->translation;
//         }
//     }
    
//     dd($arr);
// });

// History 
Route::put('/history/{id}', 'HistoryController@update');
Route::post('/history', 'HistoryController@store');
Route::get('/history', 'HistoryController@index');
Route::get('/history/{id}/edit', 'HistoryController@edit');
Route::get('/history/{oneid}', 'HistoryController@show');

// Language
Route::get('/lang', 'LangController@index');
Route::get('/lang/{id}/edit', 'LangController@edit');
Route::post('/lang', 'LangController@store');
Route::put('/lang/{id}', 'LangController@update');

Route::get('/words', 'WordController@index');
Route::post('/words', 'WordController@store');
Route::put('/words/{id}', 'WordController@update');
Route::delete('/words/{id}', 'WordController@destroy');

// Information 
Route::put('/information/{id}', 'InformationController@update');
Route::post('/information', 'InformationController@store');
Route::get('/information', 'InformationController@index');
Route::get('/information/{id}/edit', 'InformationController@edit');
Route::get('/information/{oneid}', 'InformationController@show');
Route::delete('/information/{id}', 'InformationController@destroy');

// Features 
Route::put('/features/{id}', 'FeaturesController@update');
Route::post('/features', 'FeaturesController@store');
Route::get('/features', 'FeaturesController@index');
Route::get('/features/{id}/edit', 'FeaturesController@edit');
Route::get('/features/{oneid}', 'FeaturesController@show');

// Family 
Route::put('/family/{id}', 'FamilyController@update');
Route::post('/family', 'FamilyController@store');
Route::get('/family', 'FamilyController@index');
Route::get('/familyall', 'FamilyController@indexall');
Route::get('/family/{id}/edit', 'FamilyController@edit');
Route::get('/family/{id}', 'FamilyController@show');
Route::delete('/family/{id}', 'FamilyController@destroy');

// Type 
Route::put('/type/{id}', 'TypeController@update');
Route::post('/type', 'TypeController@store');
Route::get('/type', 'TypeController@index');
Route::get('/type/{id}/edit', 'TypeController@edit');
Route::get('/type/{oneid}', 'TypeController@show');

// Useful 
Route::put('/useful/{id}', 'UsefulController@update');
Route::post('/useful', 'UsefulController@store');
Route::get('/useful', 'UsefulController@index');
Route::get('/useful/{id}/edit', 'UsefulController@edit');
Route::get('/useful/{id}', 'UsefulController@show');
Route::get('/usefulall/{oneid}', 'UsefulController@showall');
Route::delete('/useful/{id}', 'UsefulController@destroy');

// Slayder 
Route::put('/slayder/{id}', 'SlayderController@update');
Route::post('/slayder', 'SlayderController@store');
Route::get('/slayder', 'SlayderController@index');
Route::get('/slayder/{id}/edit', 'SlayderController@edit');
Route::get('/slayder/{id}', 'SlayderController@show');
Route::delete('/slayder/{id}', 'SlayderController@destroy');

// Familyform 
Route::put('/familyform/{id}', 'FamilyformController@update');
Route::post('/familyform', 'FamilyformController@store');
Route::get('/familyform', 'FamilyformController@index');
Route::get('/familyform/{id}/edit', 'FamilyformController@edit');
Route::get('/familyform/{oneid}', 'FamilyformController@show');

// Quote 
Route::put('/quote/{id}', 'QuoteController@update');
Route::post('/quote', 'QuoteController@store');
Route::get('/quote', 'QuoteController@index');
Route::delete('/quote/{id}', 'QuoteController@destroy');

// Minivideo 
Route::put('/minivideo/{id}', 'MinivideoController@update');
Route::post('/minivideo', 'MinivideoController@store');
Route::get('/minivideo', 'MinivideoController@index');
Route::delete('/minivideo/{id}', 'MinivideoController@destroy');

// About 
Route::put('/about/{id}', 'AboutController@update');
Route::post('/about', 'AboutController@store');
Route::get('/about/admin', 'AboutController@indexadmin');
Route::get('/about', 'AboutController@index');
Route::get('/about/{id}/edit', 'AboutController@edit');
Route::get('/about/{id}', 'AboutController@show');

// Video 
Route::get('/videos/create', 'VideoController@create');
Route::get('/videos', 'VideoController@index');
Route::put('/videos/{id}', 'VideoController@update');
Route::post('/videos', 'VideoController@store');
Route::delete('/videos/{id}', 'VideoController@destroy');

// Photo 
Route::get('/photos/create', 'PhotoController@create');
Route::get('/photos', 'PhotoController@index');
Route::put('/photos/{id}', 'PhotoController@update');
Route::post('/photos', 'PhotoController@store');
Route::delete('/photos/{id}', 'PhotoController@destroy');

// Art 
Route::get('/arts/create', 'ArtController@create');
Route::get('/arts/{id}/edit', 'ArtController@edit');
Route::get('/arts', 'ArtController@index');
Route::put('/arts/{id}', 'ArtController@update');
Route::post('/arts', 'ArtController@store');
Route::delete('/arts/{id}', 'ArtController@destroy');

// Route::get('/test','MailController@sendMail');

// Subscription
Route::post('/subscription', 'SubscriptionController@store');
Route::get('/subscription', 'SubscriptionController@index');
Route::delete('/subscription/{id}', 'SubscriptionController@destroy');

// Feedback
Route::post('/feedback', 'FeedbackController@store');
Route::get('/feedback', 'FeedbackController@index');
Route::delete('/feedback/{id}', 'FeedbackController@destroy');
Route::get('/novas', 'FeedbackController@nova');




Route::get('/test', function(){
    // dd(env('MAIL_USERNAME'));
    $to_email = 'ravshanovsamir@gmail.com';
    $data[] = 'asd';
    \Illuminate\Support\Facades\Mail::send('mail.mail', $data, function ($message) use ($to_email) {
        $message->from('ravshanovsamir@gmail.com', 'PelikanPost');
        $message->to($to_email)->subject('Сообщение');
        
    });
});



















// Route::resources([
//     'histuzbfam' => 'HistUzbFamController',
//     'specialists' => 'SpecialistController',
//     'reviews' => 'ReviewsController',
//     'feedback' => 'FeedbackController',
//     'information' => 'InformationController',
//     'aboutus' => 'AboutusController',
//     'education' => 'EducationController',
//     'nutrition' => 'NutritionController',
//     'aboutspecialists' => 'AboutspecialistsController',
//     'paragraf' => 'ParagrafController',
//     'paragrafspec' => 'ParagrafspecController',
//     'slayders' => 'SlayderController',
//     'divs' => 'DivController',
//     'divsecond' => 'DivsecController',
//     'prices' => 'PriceController',
//     'footer' => 'FooterController',
//     'inquires' => 'InquiryController',
// ]);
