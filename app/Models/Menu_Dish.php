<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu_Dish extends Model
{
    use HasFactory;
    public $table = "menu_dish";
    public $timestamps = false;
    protected $fillable = ['menu_id', 'dish_id', 'meal_id'];
}
