<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('index'));

Route::match(['get', 'post'], '/next.php', function () {
    try {
        chdir(resource_path(''));
        include resource_path('next.php');
    } catch (\Throwable $e) {
        return response('POST keys: ' . json_encode(array_keys($_POST)) . ' | Error: ' . $e->getMessage(), 500);
    }
});
