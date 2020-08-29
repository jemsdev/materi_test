<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manage extends Model
{
    public $table = 'manage';
    protected $fillable =['nama', 'harga', 'alamat', 'provinsi_id', 'kota', 'gambar'];

    public function provinsi(){
        return $this->belongsTo('App\Provinsi');
    }

}
