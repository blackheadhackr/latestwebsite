<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\Category;

Route::get('/', function () {
    return view('welcome');
});
route::get('category',[Homecontroller::class, 'home']);
route::post('addcategory',[Category::class, 'add_catg'])->name('add-category');