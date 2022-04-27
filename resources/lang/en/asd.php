<!-- <php  -->
<?php
$arr = [];
foreach(App\Lang::where('prefix', 'en')->get() as $lang){
    foreach (\App\Word::where('lang', $lang->id)->get() as $data) {
        $arr[$data->key] = $data->translation;
    }
}

return $arr;

// return [ 
//     foreach(App\Word::where('lang', 'en')->get() as $data) {
//         '$data->key' => '$data->translation',
//     }
        
    
    // 'Музей <br> узбекской семьи' => 'Museum of the <br> Uzbek family',
    // 'О музее' => 'About the museum',
    // 'История' => 'Story',
    // 'История узбекской <br> семьи' => 'History узбекской <br> семьи',
    // '3D Тур' => '3D Tour',
    // 'год основания' => 'year of foundation',
    // 'посетителей' => 'visitors',
    // 'фото и публикаций' => 'photos and publications',
    // 'История узбекской семьи' => 'History of the Uzbek family',
    // 'Формы брака' => 'Forms of marriage',
    // 'Формы семьи' => 'Family forms',
    // 'Мысли великих людей' => 'Thoughts of great people',
    // 'Семейный церимониал' => 'Family cerimonial',
    // 'Все статьи' => 'All articles',
    // 'Читать' => 'Read',
    // 'Полезные ресурсы' => 'Useful Resources',
    // 'Все ресурсы' => 'All resources',
    // 'Монографии' => 'Monographs',
    // 'Публикации' => 'Publications',
    // 'Научные статьи' => 'Science articles',
    // 'Диссертации' => 'Dissertations',
    // 'Изречения, пословицы, поговорки, <br> стихи' => 'Sayings, proverbs, sayings',
    // 'Статьи в СМИ' => 'Articles in the media',
    // 'Подробнее' => 'More details',
    // 'Все фото' => 'All photos',
    // 'Все видео' => 'All videos',
    // 'Вся галерея' => 'Whole gallery',
    // 'Видео галерея' => 'Video gallery',
    // 'Фото галерея' => 'Photo gallery',
    // 'Арт-галерея' => 'Art gallery',
    // 'Ваша почта' => 'Your mail',
    // 'Версия для слабовиящих' => 'Version for the weak',
    // 'Выключить звук' => 'Turn off the sound',
    // 'Включить звук' => 'Turn on sound',
    // 'Подписывайтесь на нас' => 'Follow us',
    // 'Выкл' => 'Off',
    // 'Вкл' => 'On',
    // 'Законодательство <br> о семье' => 'Family <br> Legislation',
    // 'Республика Узбекистан' => 'The Republic of Uzbekistan',
    // 'Туркестан' => 'Turkestan',
    // 'СССР' => 'The USSR',
    // 'Типология <br> брака и семьи' => 'Typology of marriage',
    // 'Региональные особенности <br> узбекских семей' => 'Regional features of uzbek family',
    // 'Ceмейный <br> церемониал' => 'Family wedding',
    // 'Галерея' => 'Gallery',
    // 'г. Ташкент, Шайхантохурский р-н, 100128 ул. А.Кадырий 7А' => 'Tashkent, Shaikhantokhur district, 100128 st. A.Kadyriy 7A',
    // 'Адрес' => 'The address',
    // 'Телефон' => 'Telephone',
    // 'Карта сайта' => 'Site`s map',
    // 'Региональные особенности узбекских семей' => 'Regional features of uzbek families',
    // 'Проблемы семьи' => 'Family problems',
    // 'Подписывайтесь на обновления музея узбекской семьи' => 'Subscribe to updates of the museum of the Uzbek family',
    // 'Следите за нами в социальных сетях' => 'Follow us on social media',
    // 'Подписаться' => 'Subscribe',
    // '2021 “Музей узбекской семья”  Все права защищены' => '2021 "Museum of the Uzbek family" All rights reserved',
    // 'Политика конфиденциальности' => 'Privacy Policy',
    // 'Типы брака' => 'Types of marriage',
    // 'Введите ваш e-mail*' => 'Enter your e-mail*',
    // 'Подпишитесь <br> на обновления электронного музея' => 'Subscribe',
    // 'Введите ваш е-mail адрес, чтобы быть в курсе последних публикаций' => 'Enter your e-mail address to keep abreast of the latest publications',
    // 'Рождение ребенка' => 'Nacimiento de un niño',
    // 'Документальные фильмы' => 'Documentales',
    // 'Художественные фильмы' => 'Películas de arte',
    // 'Показать еще' => 'Mostrar más',
    // 'Ваш почтовый ящик' => 'Tu buzón',
//     ]   
// >