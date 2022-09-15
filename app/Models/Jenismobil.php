<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Jenismobil extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = ['id_type','namamobil','harga','tahun','status'];

    public function Typemobil(){
        return $this->belongsTo('App\Models\Typemobil','id_type','id');

    }

    public function Transaksi(){
        return $this->hasMany('App\Models\Transaksi','id','id_jenis');
    }
    
}
