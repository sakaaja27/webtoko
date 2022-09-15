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

class PembayaranController extends Controller{
    
	public function index(Request $request){
        $data = Pembayaran::orderby('payment')->get();

        return view('payment',compact('data'));
    }

    public function add(Request $request){

    }

    public function store(Request $request){

    	Pembayaran::create([
    		'payment' => $request->payment,
            'rekening' => $request->rekening,
    	]);

    	return redirect()->route('payment')->with('status','Data sukses input');
    }

    public function edit(Request $request, $id){

    }

    public function update(Request $request, $id){
        
    }

    public function destroy($id){
        
    }
}
