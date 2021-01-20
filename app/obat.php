<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class obat extends Model
{
    protected $fillable=[
        'id',
        'nama_obat',
        'harga_obat',
        'komposisi_obat',
        'expired_date',
    ];
}
