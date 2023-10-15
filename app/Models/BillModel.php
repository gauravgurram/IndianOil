<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillModel extends Model
{
    use HasFactory;
    protected $fillable=['cid','invoiceno','date','tankgiventoday','tankreturntoday','tankremaining','tankprice','totalprice','todaystotal','previousamt','advance','completetotal'];
}

