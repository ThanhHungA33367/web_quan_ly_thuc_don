<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;
    public $table = "dishes";
    public $timestamps = false;
    protected $fillable = ['dish_type_id','children_type_id','name','description', 'kalo','protein', 'lipid', 'carb', 'cost'];
}
