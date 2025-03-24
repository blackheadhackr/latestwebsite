<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homecontroller;

Route::get('/', function () {
    return view('welcome');
});
route::get('category',[Homecontroller::class, 'home']);