<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('index'));

Route::match(['get', 'post'], '/next.php', function () {
    try {
        chdir(resource_path(''));
        include resource_path('next.php');
    } catch (\Throwable $e) {
        return response($e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(), 500);
    }
});
