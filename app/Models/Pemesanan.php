<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $fillable =[
        'id_order','date','nama','jumlah_order','subtotal'
    ];
}
