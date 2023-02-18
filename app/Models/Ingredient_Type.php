<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient_Type extends Model
{
    use HasFactory;
    public $table = "ingredient_type";
    public $timestamps = false;
    protected $fillable = ['name','description'];
}
