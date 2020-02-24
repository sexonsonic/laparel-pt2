<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wali extends Model
{
    protected $fillable = ['nama','id_mahasiswa'];
    public $timestamps = true;

    Public function mahasiswa(){
        return $this->belongsTo('App\Mahasiswa','id_mahasiswa');
    }
}
