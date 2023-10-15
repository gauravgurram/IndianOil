<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgencyModel extends Model
{
    use HasFactory;
    protected $fillable=['owntanks','customer_having_tanks','empty_tanks','filled_tanks','lost_tanks','total_tanks','todate'];
}
