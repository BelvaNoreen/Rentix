<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class etiket extends Model
{
    protected $fillable =[
        'nama','kategori','tanggal','harga','stok'
    ];
}
