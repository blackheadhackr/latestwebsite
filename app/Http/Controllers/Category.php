<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Categor;
use App\Models\Addtagsmodel;

class Category extends Controller
{
    /* ===================================== Add function(catg & tags) ===================================== */
    public function add_catg(Request $req){
        $validation = $req->validate([
            'catgname' => 'required|regex:/^[A-Za-z]+$/|max:255|unique:category,name',
        ],[
            'required' => 'Please fill this feild first',
            'regex' => 'Special characters are not allowed',
            'unique' => 'This name is already added',
            'max' => 'you have reached max limit please make it short'
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
    public function add_tags(Request $req){
        
        $validation = $req->validate([
            'tagsname' => 'required|regex:/^[A-Za-z]+$/|max:255|unique:tags,name',
        ],[
            'required' => 'Please fill this feild first',
            'regex' => 'Special characters are not allowed',
            'unique' => 'This name is already added',
            'max' => 'you have reached max limit please make it short'
        ]);

        if($validation){
            
            $data = new Addtagsmodel;
            $data->name = $req->input('tagsname');
            if($data->save()){
                toastr()->success('Tags added Successfully');
                return redirect()->route('catg');
            }else{
                toastr()->error('Something went wrong please wait or try again latter');
                return redirect()->route('catg');
            }
        }else{
            toastr()->error('validation not success please wait or try again latter');
            return redirect()->route('catg');
        }
    }
    /* ===================================== Get single function(catg & tags) ===================================== */
    public function get_single_catg(Request $req){
        $id= $req->input('id');
        $data = Categor::find($id);
        return Response()->json($data);
    }
    /* ===================================== Update Category functions ===================================== */
    public function categoryeditsub(Request $req){

        $validation = validator::make($req->all(),
            [
                'edtctg' => 'required|regex:/^[A-Za-z]+$/|max:255|unique:category,name',
            ],[
                'required' => 'Please fill this feild first',
                'regex' => 'Special characters are not allowed',
                'unique' => 'This name is already added',
                'max' => 'you have reached max limit please make it short'
            ]
        );
        if($validation->fails()){
            return response()->json(['error'=>$validation->errors()],422);
        }else{
           $data = Categor::find($req->input('eid'));
           $data->name = $req->input('edtctg');
           if($data->save()){
            return response()->json([ 'status' => 200,'sdta'=> 'Data Uploaded Successfully']);
           }else{
            return response()->json(['status' => 500,'message' => 'Failed to update category.'],500);
           }
        }
    }
    /* ===================================== Delete category functions ===================================== */
    public function catgdel(Request $req){
       $id = $req->input('id');

       $data = Categor::destroy($id);
       return response()->json(['status' => 200 , 'message' => 'Record is deleted permanently']);
    }
    
}
