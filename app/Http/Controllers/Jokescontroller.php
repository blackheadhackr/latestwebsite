<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JokeimgModel;

class Jokescontroller extends Controller
{
    public function addjokesimage(Request $req){
        $validation = $req->validate([
            'jokestitle' => 'required|regex:/^[A-Za-z\s]+$/|max:255|unique:jokesimg,joke_name',
            'jokesdesc' => 'required|string',
            'jokeimg' => 'required | image | mimes:jpg,jpeg,png,svg| max:512',
        ],[
            'required' => 'This feild is required',
            'regex' => 'Only alphabets are allowed',
            'unique' => 'This name is already added',
            'max' => 'you have reached max limit please make it short',
            'mimes'=> 'Only JPG ,JPEG ,PNG ,SVG are allowd',
            'max' => 'file size not more then 500KB'
        ]);
        if($validation){
            echo "everything is good";
        }

    }
}
