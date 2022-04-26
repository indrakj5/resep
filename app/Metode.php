<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Metode extends Model
{
    protected $table = 'metode';

    protected $fillable = ['nama', 'deskripsi'];
}
