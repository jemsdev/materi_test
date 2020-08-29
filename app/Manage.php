<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manage extends Model
{
    public $table = 'manage';
    protected $fillable =['nama', 'harga', 'alamat', 'provinsi_id', 'kota_id', 'gambar'];

    public function provinsi(){
        return $this->belongsTo('App\Provinsi');
    }

    public function kota(){
        return $this->belongsTo('App\Kota');
    }

}
