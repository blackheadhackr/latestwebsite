<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\Category;
use App\Http\Controllers\Jokescontroller;
use App\Http\Controllers\Login;

Route::get('/', function () {
    return view('admin.dashboard');
});
/**Home controller */
route::get('category',[Homecontroller::class, 'cattag'])->name('catg');
Route::get('jokes',[Homecontroller::class, 'jokes'])->name('jokes');
Route::get('jokes-image',[Homecontroller::class , 'jokesimg'])->name('jokesimage');
Route::get('login',[Homecontroller::class , 'login'])->name('login');
/** category and tags */
route::post('addcategory',[Category::class, 'add_catg'])->name('add-category');
Route::post('addtags',[Category::class , 'add_tags'])->name('add-tags');
Route::post('singlecatg',[Category::class, 'get_single_catg'])->name('get_singlecatg');
Route::post('singletags',[Category::class, 'get_single_tags'])->name('get_singletags');
Route::post('editcatg',[Category::class, 'categoryeditsub'])->name('categoryeditsubmit');
Route::post('edittags',[Category::class, 'tagseditsub'])->name('tagseditsubmit');
Route::post('delcatg',[Category::class, 'catgdel'])->name('delete-category');
Route::post('deltag',[Category::class, 'tagdel'])->name('delete-tags');
/** ======================= Jokes ======================= */
Route::post('jokes-image',[Jokescontroller::class, 'addjokesimage'])->name('addjokesimg');
Route::get('edit-jokes-image/{id}',[Jokescontroller::class, 'editjokesimage'])->name('editjokesimg');
Route::post('update-jokes-image',[Jokescontroller::class, 'updatejokesimg'])->name('updatejokesimg');
Route::post('delete-jokes-image',[Jokescontroller::class, 'deletejokeimage'])->name('deletejokesimg');


/** =============================== login and logout =============================== */
Route::post('login-sub',[Login::class, 'login'])->name('login-sub');