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

class TypeMobilController extends Controller{
    
	public function index(Request $request){
        $data = Typemobil::orderby('namatype')->get();

        return view('typemobil',compact('data'));
    }

    public function add(Request $request){

    }

    public function store(Request $request){

    	Typemobil::create([
    		'namatype' => $request->namatype,
    	]);

    	return redirect()->route('typemobil')->with('status','Data sukses input');
    }

    public function edit(Request $request, $id){

    }

    public function update(Request $request, $id){
        
    }

    public function destroy($id){
        
    }
}
