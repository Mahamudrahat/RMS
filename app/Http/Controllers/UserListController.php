<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userlist;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class UserListController extends Controller
{
    public function createuserlist(Request $req){
        //Create $user object for userlist class
           $user=new userlist();
           $user->username=$req->input('username');
           $user->full_name=$req->input('full_name');
           $user->phoneno=$req->input('phoneno');
           $user->email=$req->input('email');
           $user->password=Hash::make($req->input('password'));
        // Checking Condition for database write
           if($user->username!=NULL &&  $user->full_name!=null &&
           $user->phoneno!=null &&
           $user->email!=null&&  $user->password!=null){
             $user->save();
             return response()->json(["error"=>"False","message"=>"Data Added Successfully"],201);
           }
           else{
            return response()->json(["error"=>"true","message"=>"Parameter Should have data"],400);
         }
    }
}
