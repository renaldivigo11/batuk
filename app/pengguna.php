<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengguna extends Model
{
    protected $fillable=[
        'id',
        'nama_pengguna',
        'umur_pengguna',
    ];
}
