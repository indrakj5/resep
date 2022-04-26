<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facedes\DB;

class Resep extends Model
{
    protected $table = 'resep';

    protected $fillable = ['judul', 'content', 'thumbnail', 'kategori_id'];

    public function komentar()
    {
        return $this->hasMany('App\Komentar');
    }

    public function allData()
    {
        return DB::table('resep')
            ->join('kategori','resep.id', '=', 'kategori.resep_id')
            ->get();
    }
}
