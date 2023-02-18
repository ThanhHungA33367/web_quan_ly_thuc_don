<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish_Type extends Model
{
    use HasFactory;
    public $table = "dish_type";
    public $timestamps = false;
    protected $fillable = ['name','description','id_field'];
}
