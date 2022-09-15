<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = ['payment','rekening'];

    public function Transaksi(){
        return $this->hasMany('App\Models\Transaksi','id','id_bayar');
    }
}
