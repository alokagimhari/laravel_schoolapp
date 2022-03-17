<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;
Use App\Models\User;
use Illuminate\Support\Facades\Auth;



//use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller{

    public function register(Request $request)
    {
        $request ->validate([
            "name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required|confirmed"
        ]);
       /*$rules =[
            'name'=>['required','string','max:255'],
            'email'=>['required','string','email','max:255','unique:users'],
            'password'=>['required','string','min:8','confirmed'],
        ];*/

            $user = new User();//chsnge to ()
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            return response()->json([
                "status" => 1,
                "message" => "user registered successfully"

            ]);
            }
            public function login(Request $request)
            {
                $request->validate([
                    "email"=>"required|email",
                    "password"=>"required"

                ]);

                $user = User::where("email","=",$request->email)->first();

                if(isset($user->id))
                {
                    if(Hash::check($request->password,$user->password))
                    {
                            $token=$user->createToken("auth_token")->plainTextToken;
                        
                        return response()->json([
                            "status"=>1,
                            "message"=>"User logged in successfully",
                            "access_token"=>$token
                        ]);
                    } else
                    {
                        return response()->json([
                            "status"=>0,
                            "message"=>"password didn't match"
                        ],404);
                    }
                }else
                {
                    return response()->json([
                        "status"=>0,
                        "message"=>"User not found"
                    ],404);
                }
            }   
            
    

}

