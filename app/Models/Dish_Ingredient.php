<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish_Ingredient extends Model
{
    use HasFactory;
    public $table = "dish_ingredient";
    public $timestamps = false;
    protected $fillable = ['ingredient_id','dish_id','quantity'];
}
