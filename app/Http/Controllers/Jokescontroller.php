<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JokeimgModel;
use App\Models\Categor;

class Jokescontroller extends Controller
{
    public function addjokesimage(Request $req){
        $validation = $req->validate([
            'jokestitle' => 'required|regex:/^[A-Za-z\s]+$/|max:255|unique:jokesimg,title',
            'catgselect' => 'required|regex:/^[A-Za-z\s]+$/',
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
            // return JokeimgModel::all();
            $path = $req->file('jokeimg')->store('jokesimg','public');
            // return $path;
            if($path){
                $data = new JokeimgModel;
                $data->title = $req->input('jokestitle');
                $data->desc = $req->input('jokesdesc');
                $data->catg = $req->input('catgselect');
                $data->image = $path;
                if($data->save()){
                    toastr()->success('Jokes uploaded successfully.');
                    return redirect()->route('addjokesimg');
                }else{
                    return "something went wrong";
                }
            }
        }

    }
    public function editjokesimage($id){
        $data = JokeimgModel::find($id);
        $catg = Categor::orderby('id','desc')->get();
        return view('admin.editjokesimg',compact('data','catg'));
    }
}
