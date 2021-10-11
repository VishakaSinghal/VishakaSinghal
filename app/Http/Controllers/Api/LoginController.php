<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Response;
use Illuminate\Support\Facade\Auth;

class LoginController extends Controller
{
	public $user;
    public function __constructor($user){
    	$this->user=$user;
    }
    public function login(Request $request){
       $input = $request->all();
       $status_code = 200;
       try{
       	  $rule =['email'=>'required','pwd'=>'required'];
          $validator = Validator::make($input,$rule);
          if($validator->fails()){

          }elseif(){

          }else{
          	return response()->json('message','successfull');

          }
       }catch(Exception $e){
          
       }finally{
           return response()->json()
       }
    }
}
