<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\Category;
use App\Http\Controllers\Jokescontroller;

Route::get('/', function () {
    return view('welcome');
});
/**Home controller */
route::get('category',[Homecontroller::class, 'cattag'])->name('catg');
Route::get('jokes',[Homecontroller::class, 'jokes'])->name('jokes');

/** category and tags */
route::post('addcategory',[Category::class, 'add_catg'])->name('add-category');
Route::post('addtags',[Category::class , 'add_tags'])->name('add-tags');
Route::post('singlecatg',[Category::class, 'get_single_catg'])->name('get_singlecatg');
Route::post('singletags',[Category::class, 'get_single_tags'])->name('get_singletags');
Route::post('editcatg',[Category::class, 'categoryeditsub'])->name('categoryeditsubmit');
Route::post('edittags',[Category::class, 'tagseditsub'])->name('tagseditsubmit');
Route::post('delcatg',[Category::class, 'catgdel'])->name('delete-category');
Route::post('deltag',[Category::class, 'tagdel'])->name('delete-tags');

/** Jokes  */