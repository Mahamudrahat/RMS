<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\recipe;

class ApiRecipeController extends Controller
{
    public function update(Request $req){
             $recipes=new recipe();
             $recipes->itemname=$req->input('itemname');
             $recipes->user_id=$req->input('user_id');
             $recipes->description=$req->input('description');
             $recipes->ingredients=$req->input('ingredients');
             $recipes->image_url=$req->input('image_url');
             if($recipes->description!=NULL && $recipes->itemname!=NULL && $recipes->ingredients!=NULL &&
             $recipes->user_id!=NULL && $recipes->image_url!=NULL){
                $recipes->save();
                return response()->json(["error"=>"False","message"=>"Data Added Successfully"],201);
             }
             else{
                return response()->json(["error"=>"true","message"=>"Parameter Should have data"],400);
             }

    }
    public function list($id1,$id2){
        $users = DB::table('receipe')
        ->whereBetween('id', [$id1,$id2])
        ->join('User','receipe.id','=','User.id')->get();
        return response()->json(["error"=>"false","data"=>$users]);
    }
}
