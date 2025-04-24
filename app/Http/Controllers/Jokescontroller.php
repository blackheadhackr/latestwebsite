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
            'jokestitle.max' => 'Title can\'t be more than 255 characters',
            'jokeimg.max' => 'Image size must not exceed 500KB',
            'jokeimg.mimes' => 'Only JPG, JPEG, PNG, and SVG files are allowed',
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
    public function updatejokesimg(Request $req){
        // return $req->input();
        if($req->file('jokeimg')){
            $validation = $req->validate([
                'jokestitle' => 'required|regex:/^[A-Za-z\s]+$/|max:255',
                'catgselect' => 'required|regex:/^[A-Za-z\s]+$/',
                'jokesdesc' => 'required|string',
                'jokeimg' => 'required | image | mimes:jpg,jpeg,png,svg| max:512',
            ],[
                'required' => 'This feild is required',
                'regex' => 'Only alphabets are allowed',
                'unique' => 'This name is already added',
                'jokestitle.max' => 'Title can\'t be more than 255 characters',
                'jokeimg.max' => 'Image size must not exceed 500KB',
                'jokeimg.mimes' => 'Only JPG, JPEG, PNG, and SVG files are allowed',
            ]);
            if($validation){
                $path = $req->file('jokeimg')->store('jokesimg','public');

                if($path){
                    $data = JokeimgModel::find($req->input('id'));
                    $data->title = $req->input('jokestitle');
                    $data->desc = $req->input('jokesdesc');
                    $data->image = $path;
                    $data->updated_at = now()->setTimezone(config('app.timezone'))->format('Y-m-d H:i:s');
                    $data->catg = $req->input('catgselect');
                    if($data->save()){
                        toastr()->success('Jokes Updated Successfully.');
                        return redirect()->route('jokesimage');
                    }else{
                        toastr()->error('Something went wrong, Please try again latter...');
                        return redirect()->route('jokesimage');
                    }
                }
            }
        }else{
            $validate = $req->validate([
                'catgselect'=>'required|string|regex:/^[A-Za-z\s]+$/',
                'jokestitle' => 'required|string|max:255',
                'jokesdesc' => 'required|string|max:255'
            ],[
                'required' => 'This feild is required',
                'regex' => 'Only alphabets are allowed',
                'max' => 'you have reached max limit please make it short',
            ]);
            if($validate){
                $data = JokeimgModel::find($req->id);
                $data->title = $req->input('jokestitle');
                $data->desc = $req->input('jokesdesc');
                $data->catg = $req->input('catgselect');
                $data->updated_at = now()->setTimezone(config('app.timezone'))->format('Y-m-d H:i:s');
                if($data->save()){
                    toastr()->success('Jokes Updated Successfully.');
                    return redirect()->route('jokesimage');
                }else{
                    toastr()->error('Something went wrong, Please try again latter...');
                    return redirect()->route('jokesimage');
                }
            }
        }
    }
    public function deletejokeimage( Request $req){
        $id = $req->input('id');
        $data = JokeimgModel::find($id);
        $data->delete();
        $path = public_path('storage/').$data->image;
        // return $path;
        if(file_exists($path)){
            @unlink($path);
            return response()->json(['status' => 200, 'msg' => 'This file is permanently deleted']);
        }
    }
}
