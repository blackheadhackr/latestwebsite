<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categor;
class Homecontroller extends Controller
{
    public function home(){
        $data = Categor::all();
        return view('admin.catg', compact('data'));
    }
    
}
