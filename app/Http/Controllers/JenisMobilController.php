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

class JenisMobilController extends Controller{
    public function index(Request $request){
        $data = Jenismobil::where('status','1')->get();
        $tipemobil = Typemobil::get();

        return view('jenismobil',compact('data','tipemobil'));
    }

    public function add(Request $request){

    }

    public function store(Request $request){
        Jenismobil::create([
            'id_type' => $request->id_type,
            'namamobil' => $request->namamobil,
            'harga' => $request->harga,
            'tahun' => $request->tahun,
        ]);

        return redirect()->route('jenismobil')->with('status','Data sukses input');
    }

    public function editmob(Request $request){
        $mob = Jenismobil::findorFail($request->get('id'));
        return view('jenismobil',compact('mob'));
    }

    public function updatemobil(Request $request){
    }

    public function delmobil($id){
        $mobil = Jenismobil::where('id',$id)->first();
        $update = Jenismobil::updateOrCreate(['id' => $id],[
            'status' => '0',
            'namamobil' => $mobil['namamobil'],
            'harga' => $mobil['harga'],
            'tahun' => $mobil['tahun'],
        ]);
        return redirect()->route('jenismobil')->with('success','Data uda di hapus bro');
    }

     public function destroy($id){
        $del = Jenismobil::where('id',$id)->delete();
         return redirect()->route('jenismobil')->with('berhasil','Data uda di hapus bro');
    }
}
