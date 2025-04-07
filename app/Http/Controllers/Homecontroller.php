<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categor;
use App\Models\Addtagsmodel;
class Homecontroller extends Controller
{
    public function home(){
        $data = Categor::orderby('id','desc')->get();
        $tags = Addtagsmodel::orderby('id','desc')->get();
        return view('admin.catg', compact('data','tags'));
    }
    
}
