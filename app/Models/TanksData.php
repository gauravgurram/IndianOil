<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TanksData extends Model
{
    use HasFactory;

    protected $fillable=['cid','tanks_given_today','tanks_return_today','tanks_remaining','previous_remaining_tanks','tanks_price_per','todays_total','previous_total','today_given_amt','payment_method','total','givendate','billinvoice'];
}
