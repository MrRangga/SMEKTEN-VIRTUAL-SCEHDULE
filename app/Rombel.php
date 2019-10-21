<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rombel extends Model
{
    protected $fillable=['nama_rombel'];
    protected $table='rombel';

    public function pelajaran()
    {
        return $this->hasMany('App\Jadwal','id_rombel');
    }
}
