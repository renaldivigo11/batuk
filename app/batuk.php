<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class batuk extends Model
{
    protected $fillable=[
        'id',
        'id_pengguna',
        'tekanan_batuk',
        'waktu_batuk',
    ];
}
