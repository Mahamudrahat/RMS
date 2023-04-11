<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recipe extends Model
{
    //use HasFactory;
    protected $table='receipe';
    protected $fillable=['user_id','itemname','description','ingredients','image_url'];
}
