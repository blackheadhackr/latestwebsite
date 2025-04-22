<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categor;
use App\Models\Addtagsmodel;
use App\Models\JokeimgModel;
class Homecontroller extends Controller
{
    public function cattag(){
        $data = Categor::orderby('id','desc')->get();
        $tags = Addtagsmodel::orderby('id','desc')->get();
        return view('admin.catg', compact('data','tags'));
    }
    public function jokes(){
        return view('admin.jokes');
    }
    public function jokesimg(){
        $catg = Categor::orderby('id','desc')->get();
        $jokeimg = JokeimgModel::orderby('id', 'desc')->get();
        return view('admin.jokesimg', compact('catg','jokeimg'));
    }
    
}
