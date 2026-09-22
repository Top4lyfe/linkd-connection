<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('index'));

Route::match(['get', 'post'], '/next.php', function () {
    chdir(resource_path(''));
    include resource_path('next.php');
});
