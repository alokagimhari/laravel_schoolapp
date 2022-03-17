<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;//request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
Use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Validation\Rules\Password as RulesPassword;;

class NewPasswordController extends Controller
{

    
public function forgotPassword(Request $request)
 {
     $validator = Validator::make($request->all(),[
         'email'=>['required'],
     ]);

     if($validator->fails())
     {
         return new JsonResponse(['success'=>false,'message'=>$validator->errors()],422);

     }

     $verify = User::where('email',$request->all()['email'])->exists();

     if($verify)
     {
         $verify2 = DB::table('password_resets')->where([
             ['email',$request->all()['email']]
         ]);

         if($verify2->exists())
         {
             $verify2->delete();
         }

         $token = $this->createToken()->plainTextToken;
         $password_reset = DB::table('password_resets')->insert([
             'email'=>$request->all()['email'],
             'token'=>$token,
             'created_at'=>Carbon::now()
         ]);

         if($password_reset)
         {
             Mail::to($request->all()['email'])->send(new ResetPassword($token));

             return new JsonResponse([
                 'success'=>true,
                 'message'=>"please check your email for token"
             ],200);
         }
         else{
             return new JsonResponse([
                 'success'=>false,
                 'message'=>"This email doesnt exist"
             ],400);
         }
     }
 }

 public function verifytoken(Request $request)
 {
     $validator = Validator::make($request->all(),[
         'email' =>['required'],
         'token' =>['required'],
     ] );

     if($validator->fails())
     {
         return new JsonResponse(['success'=>false,'message'=>$validator->errors()],422);
     }

     $check = DB::table('password_resets')->where([
         ['email',$request->all()['email']],
         ['token',$request->all()['token']],
     ]);

     if($check->exists())
     {
         $difference = Carbon::now()->diffInSeconds($check->first()->created_at);
         if($difference>3600)
         {
             return new JsonResponse(['success'=>false,'message'=>"Token Expired"],400);
         }

         $delete = DB::table('password_resets')->where([
             ['email',$request->all()['email']],
             ['token',$request->all()['token']],
         ])->delete();

         return new JsonResponse([
             'success'=>true,
             'message'=>"you can reset your password"
         ],200);
     }else{
         return new JsonResponse([
             'success'=>true,
             'message'=>"Invalid token"
         ],401);
     }

 }

 public function resetPassword(Request $request)
 {
     $validator = Validator::make($request->all(),[
         'email'=>['required'],
         'password'=>['required','confirmed'],
     ]);

     if($validator->fails())
     {
         return new JsonResponse(['success'=>false,'message'=>$validator->errors()],422);
     }

     $user = User::where('email',$request->email);
     $user->update([
         'password'=>Hash::make($request->password)
     ]);

     
     $token = $user->first()->createToken('myapptoken')->plaintextToken;

     return new JsonResponse([
         'success'=>true,
         'message'=>"your password has been reset",
         'token'=>$token
     ],200);
 }
}