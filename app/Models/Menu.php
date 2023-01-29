<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    public $table = "menus";
    public $timestamps = false;
    protected $fillable = ['user_id', 'name', 'description', 'children_type_id', 'menu_date'];
}
