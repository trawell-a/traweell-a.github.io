<?php
$router->group([
    'prefix' => 'media', 
    'namespace' => 'Media'
], function($router) {
    $router->get('/storage/{image:.*?}', [
        'as' => 'media.show', 
        'uses' => 'MediaController@show'
    ]);
});

// Если после названия параметра мы ставим «:» — это означает, что дальше будет регулярное выражение.
// Регулярное выражение в нашем случае задает формат параметра. 
// То есть «.*?» - такое выражение, которое собирает в параметр все, что будет идти после '/storage/'. 
// Это важно, так как наши фотки будут разбиты на папки. 

// Т.е. если будет идти строка типа «/path/to/file.ext», то данное регулярное выражение проигнорирует точку и слеши.

// Если бы оно не игнорировала бы точку, то подумала бы, что это файл, 
// который лежит по адресу media/storage/path/to/file.ext и попробовала его 
// взять и в итоге отдало бы 404, так как это не настоящий путь, а виртуальный. 
// А если бы не игнорировались слеши, то lumen подумал бы, что это какой-то другой роут, 
// а этого роута не существует – ошибка 500 (что-то не так на сервере).

