<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/redis-check', function () {
    Cache::store('redis')->put('test-key', 'Redis работает!', 10);
    return Cache::store('redis')->get('test-key');
});
