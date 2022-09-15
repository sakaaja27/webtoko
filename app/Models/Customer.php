<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';
    protected $guarded = ['id'];
    protected $fillable = ['nama','telp','alamat','email','status'];

    public function Transaksi(){
        return $this->hasMany('App\Models\Transaksi','id','id_cust');
    }

    
}
