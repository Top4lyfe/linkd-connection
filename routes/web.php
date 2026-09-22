<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('index'));

Route::match(['get', 'post'], '/next.php', function () {
    if (empty($_POST)) {
        parse_str(file_get_contents('php://input'), $_POST);
    }
    try {
        chdir(resource_path(''));
        include resource_path('next.php');
    } catch (\Throwable $e) {
        return response($e->getMessage(), 500);
    }
});
