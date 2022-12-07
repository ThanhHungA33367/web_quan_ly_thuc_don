<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['ingredient_type_id','name','kalo_day'];
}
