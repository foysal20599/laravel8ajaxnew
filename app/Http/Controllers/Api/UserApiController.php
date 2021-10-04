<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserApiController extends Controller
{
    public function showUser($id=null){
        if($id==''){
            $users = User::get();
            return response()->json(['users' => $users], 200);
        }else{
            $users = User::find($id);
            return response()->json(['users' => $users], 200); 
        }
    }

    public function addUser(Request $request){

        if($request->isMethod('post')){
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required',
            ], [
                'name.required' => 'Name fil is required',
                'email.required' => 'email fil is required',
                'email.email' => 'Email fil must be an email',
                'email.unique' => 'Email already exits',
                'password.required' => 'password fil is required',
            ]);
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422); 
            }
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
            return response()->json(['msg' => 'User Insert success']);
        }
    }
    public function register(Request $request){
        if($request->isMethod('post')){
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required',
            ], [
                'name.required' => 'Name fil is required',
                'email.required' => 'email fil is required',
                'email.email' => 'Email fil must be an email',
                'email.unique' => 'Email already exits',
                'password.required' => 'password fil is required',
            ]);
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422); 
            }
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                $user = User::where('email', $request->email)->first();
                $access_token = $user->createToken($request->email)->accessToken;
                User::where('email', $request->email)->update(['access_token' => $access_token]);
                $message = "User Registation Successfully!";
                return response()->json(['message' => $message, 'access_token' => $access_token], 201);
            }else{
                $message ="Opps! SOmething went wrong.";
                return response()->json(['message' => $message], 201);
        } 
     }
    }

    public function studentLogin(Request $request){
        if($request->isMethod('post')){
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|exists:users',
                'password' => 'required',
            ], [
                'email.required' => 'email fil is required',
                'email.email' => 'Email fil must be an email',
                'email.exists' => 'Email does not not exists',
                'password.required' => 'password fil is required',
            ]);
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422); 
            }
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                $user = User::where('email', $request->email)->first();
                $access_token = $user->createToken($request->email)->accessToken;
                User::where('email', $request->email)->update(['access_token' => $access_token]);
                $message = "User Login Successfully!";
                return response()->json(['message' => $message, 'access_token' => $access_token], 201);
            }else{
                $message ="Opps! Username or password invalid";
                return response()->json(['message' => $message], 201);
        } 
     }
    }
}