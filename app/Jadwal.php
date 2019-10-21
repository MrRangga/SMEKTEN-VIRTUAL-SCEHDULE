<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $fillable=[''];
    protected $table='jadwal';

    public function ruang()
    {
        return $this->belongsTo('App\Ruang','id');
    }

    public function guru()
    {
        return $this->belongsTo ('App\Guru','id_guru');
    }

    public function rombel()
    {
        return $this->belongsTo('App\Rombel','id_rombel');
    }

    
}
