<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typemobil extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = ['namatype'];


    public function Jenismobil(){
        return $this->hasMany('App\Models\Jenismobil','id','id_type');
    }


    
}
