<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\Category;

Route::get('/', function () {
    return view('welcome');
});
route::get('category',[Homecontroller::class, 'home'])->name('catg');
route::post('addcategory',[Category::class, 'add_catg'])->name('add-category');
Route::post('addtags',[Category::class , 'add_tags'])->name('add-tags');
/** get single category and tags */
Route::post('singlecatg',[Category::class, 'get_single_catg'])->name('get_singlecatg');
Route::post('editcatg',[Category::class, 'categoryeditsub'])->name('categoryeditsubmit');
Route::post('delcatg',[Category::class, 'catgdel'])->name('delete-category');