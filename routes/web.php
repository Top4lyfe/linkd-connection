<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('index'));
Route::get('/next.php', fn() => view('next'));
Route::get('/next', fn() => view('next'));
Route::post('/email.php', function () {
    include resource_path('email.php');
});
