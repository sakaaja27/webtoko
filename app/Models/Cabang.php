<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    use HasFactory;

    protected $table = 'cabangs';
    protected $guarded = ['id'];
    protected $fillable = ['kota','alamat','status'];

    public function transaksi(){
        return $this->hasMany('App\Models\Transaksi','id','id_cab');
    }

    
}
