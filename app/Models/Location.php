<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //use HasFactory;
    protected $table='upazilla_zilla_division_map';
    protected $fillable=['Upazilla','District','Division'];
}
