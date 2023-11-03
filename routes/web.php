<?php

use Illuminate\Support\Facades\Route;

Route::get('/{operation}/{n1}/{n2}', function (string $operation, int $n1, int $n2) {
    switch ($operation) {
        case 'add':
            return $n1 + $n2;
        case 'sub':
            return $n1 - $n2;
        case 'mult':
            return $n1 * $n2;
        case 'div':
            return $n1 / $n2;
    }
})->whereIn('operation', ['add', 'sub', 'mult', 'div'])->whereNumber(['n1', 'n2']);

Route::get('/greeting/{name}/{lastname?}', function (string $name, string $lastname = 'Parker') {
    return "Hello, {$name} {$lastname}.";
})->whereAlpha(['name', 'lastname']);

Route::get('/view/greeting/{name}', function(string $name) {
    return view('greeting', ['name'=> $name]);
})->whereAlpha('name');
