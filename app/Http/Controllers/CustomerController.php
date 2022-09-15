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

class CustomerController extends Controller{

	public function index(Request $request){
        $data = Customer::where('status','1')->get();
        return view('customer',compact('data'));
    }

    public function add(Request $request){

    }

    public function store(Request $request){

    	Customer::create([
    		'nama' => $request->nama,
            'telp' => $request->telp,
            'alamat' => $request->alamat,
            'email' => $request->email,
        ]);

    	return redirect()->route('customer')->with('status','Data sukses input');
    }

    public function edit(Request $request, $id){

    }

    public function update(Request $request, $id){

    }

    public function delcust($id){
        $cust = Customer::where('id',$id)->first();
         $update = Customer::updateOrCreate(['id' => $id],[
            'status' => '0',
            'nama' => $cust['nama'],
            'telp' => $cust['telp'],
            'alamat' => $cust['alamat'],
            'email' => $cust['email'],
        ]);
        

        return redirect()->route('customer')->with('success','Data uda di hapus bro');
    }

    public function destroy($id){
        $del = Customer::where('id',$id)->delete();
         return redirect()->route('customer')->with('berhasil','Data uda di hapus bro');
    }
}
