<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BaseController extends Controller
{
    public function index(){
        return view('welcome');
    }
     public function uploadU(Request $request) {
        //  return $request->all();

        $request->validate([
            'file' => 'required',
        ]);



        $file = time() . '.' . request()->file->getClientOriginalExtension();
        $request->file->move(public_path('uploads'), $file);
        $storeFile = new Post;
        $storeFile->file = $request->file;
        $storeFile->save();

        return redirect()->back(['success', 'File Uploaded Successfully']);
    }





    public function uploadForm(){
        return view('uploadform');
    }

    public function uploadFormStore(Request $request){
        return $request->all();
    }

    public function formshow(){
        return view('form');
    }
    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
        ],[
            'name.required' => 'Name is invalid',

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        return  $request->all();
    }
}
