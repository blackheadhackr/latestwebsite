<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categor;

class Category extends Controller
{
    public function add_catg(Request $req){
        $validation = $req->validate([
            'catgname' => 'required|regex:/^[A-Za-z]+$/|max:255|unique:category,name',
        ],[
            'required' => 'Please fill this feild first',
            'regex' => 'Special characters are not allowed',
            'unique' => 'This name is already added'
        ]);
        if($validation){
            $data = new Categor;
            $data->name = $req->catgname;
            if($data->save()){
                toastr()->success('Category added Successfully');
                return redirect()->route('catg');
            }else{
                toastr()->error('Something Went Wrong');
                return redirect()->route('catg');
            }
        }else{
            toastr()->error('Something Went Wrong');
                return redirect()->route('catg');
        }
    }
    
}
