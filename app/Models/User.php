<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasFactory;
    public $table = "users";
    public $timestamps = false;
    protected $fillable = ['email','password','full_name', 'school_name', 'phone', 'status'];
}
