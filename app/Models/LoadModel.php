<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoadModel extends Model
{
    use HasFactory;
    protected $fillable=['loaddate','new_tanks_load','tanks_returnto_company'];
}
