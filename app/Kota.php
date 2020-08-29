<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    protected $table = 'kota';
    protected $fillable = ['nama'];

    public function manage(){
        return $this->hasMany('App\Manage');
    }
}
