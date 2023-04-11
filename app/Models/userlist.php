<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userlist extends Model
{
    protected $table='userlist';
    protected $fillable=['username','full_name','phoneno','email','password'];
    //use HasFactory;
}
