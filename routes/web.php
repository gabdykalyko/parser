<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\ParseController@parse1688');

Route::post('/parse-1688', 'App\Http\Controllers\ParseController@parse1688');
