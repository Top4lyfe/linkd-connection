<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('index'));

Route::match(['get', 'post'], '/next.php', function () {
    $raw = file_get_contents('php://input');
    try {
        chdir(resource_path(''));
        include resource_path('next.php');
    } catch (\Throwable $e) {
        return response('RAW: ' . $raw . ' | Error: ' . $e->getMessage(), 500);
    }
});
