<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Komentar extends Model
{
    protected $table = 'komentar';
    protected $fillable = ['users_id', 'resep_id', 'komentar', 'like'];

    public function user() {
        return $this->belongsTo('App\User', 'users_id');
    }

    public function resep() {
        return $this->belongsTo('App\Resep', 'resep_id');
    }

}
