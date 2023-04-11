<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function registerUser(Request $request): Response
     {
        $validator = Validator::make($request->all(), [
            'name'=>'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required'
             ]);
         /*$request->validate([
            'name'=>'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed']);
          //  $data['password']=Hash::make($request->password);
          //  $user=User::create($data);*/
          if (!$validator->fails()){
           $user=User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>\Hash::make($request->password)


            ]);
           // $token = $user->createToken('API Token')->accessToken;
          //  return Response([ 'status' => 200, 'token' => $token],200);
            return Response([ 'status' => 200],200);
        }
        else{
           return Response($validator->errors(),422);
        }


     }

     public function loginUser(Request $request): Response
     {
         //Get Login Info

         $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => ['required']
             ]);
    if (!$validator->fails()){

        $data=[

            'email'=>$request->email,
            'password'=>$request->password
        ];

        $userinfo=[ 'id'=>$request->id,
        'email'=>$request->email,
        'password'=>$request->password];

        if(auth()->attempt($data)){
            $token = auth()->user()->createToken('API Token')->accessToken;
            return Response(['userinfo'=>auth()->user(),'status' => 200, 'token' => $token],200);
        }
        return Response(['error'=>'Unauthorized','status' => 401],401);

    }
    else{
        return Response($validator->errors(),501);
    }


     }

    public function index()
    {
        $users=User::all();
        return response()->json(["error"=>"false","data"=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): Response
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): Response
    {
        //


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user): Response
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): Response
    {
        //
    }
}
