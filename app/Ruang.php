<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    protected $table='ruang';
    protected $fillable=['nama_ruang'];

    public function jadwal()
    {
        return $this->hasOne('App\Jadwal','id');
    }
}
