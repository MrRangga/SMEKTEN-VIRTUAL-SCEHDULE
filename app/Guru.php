<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $fillable=['nama_guru'];
    protected $table='guru';

    public function guru()
    {
        return $this->hasMany('App\Jadwal','id_guru');
    }
}
    