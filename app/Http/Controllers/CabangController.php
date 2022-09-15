<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jenismobil;
use App\Models\Transaksi;
use App\Models\Pembayaran;
use App\Models\Typemobil;
use App\Models\Customer;
use App\Models\Cabang;
use DB;

class CabangController extends Controller{

	public function index(Request $request){
        $data = Cabang::where('status','1')->get();
        return view('cabang',compact('data'));
    }

    public function add(Request $request){

    }

    public function store(Request $request){

    	Cabang::create([
    		'kota' => $request->kota,
            'alamat' => $request->alamat,
    	]);

    	return redirect()->route('cabang')->with('status','Data sukses input');
    }

    public function edit(Request $request, $id){

    }

    public function update(Request $request, $id){

    }

     public function delcabang($id){
        $cab = Cabang::where('id',$id)->first();
         $update = Cabang::updateOrCreate(['id' => $id],[
            'status' => '0',
            'kota' => $cab['kota'],
            'alamat' => $cab['alamat'],
        ]);
        return redirect()->route('cabang')->with('success','Data uda di hapus bro');
    }
}
