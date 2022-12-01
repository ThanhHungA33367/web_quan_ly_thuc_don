<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Children_Type extends Model
{
    use HasFactory;
    public $table = "children_type";
    public $timestamps = false;
    protected $fillable = ['name','description','kalo_day'];
}
