<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = ['id_cust','id_jenis','id_cab','id_bayar','jumlah','hargatotal'];

    public function Cabang(){
        return $this->belongsTo('App\Models\Cabang','id_cab','id');
    }
     public function Customer(){
        return $this->belongsTo('App\Models\Customer','id_cust','id');
    }
     public function Jenismobil(){
        return $this->belongsTo('App\Models\Jenismobil','id_jenis','id');
    }
     public function Pembayaran(){
        return $this->belongsTo('App\Models\Pembayaran','id_bayar','id');
    }
     
}

