<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataPenduduk extends Model
{
    protected $fillable = ['nama', 'jenis_kelamin', 'alamat'];
}
