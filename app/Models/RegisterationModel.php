<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterationModel extends Model
{
    use HasFactory;
    protected $fillable=['name','contact','email','username','password'];
}
