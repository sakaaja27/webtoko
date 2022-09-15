<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jenismobil;
use App\Models\Transaksi;
use App\Models\Pembayaran;
use App\Models\Typemobil;
use App\Models\Customer;
use App\Models\Cabang;
use App\Exports\TransaksiExport;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class TransaksiController extends Controller{
    public function index (Request $request){
        $transaksi = Transaksi::with('jenismobil','customer','cabang','pembayaran')->paginate(3);
        $jenismobil = Jenismobil::all();
        if($request->has('search')){
            $customer = Customer::where('nama','LIKE','%' .$request->search.'%')->paginate(3);
        }else{
            $customer = Customer::paginate(3);
        }
        $cabang = Cabang::all();
        $pembayaran = Pembayaran::all();

        return view('transaksi',compact('transaksi','jenismobil','customer','cabang','pembayaran'));
    }

    public function hometes(){
        $title = 'Home';

        return view('home',compact('title'));
    }

   public function dashboard()
    {
        $transaksi = Transaksi::all()->count();
        $customer = Customer::where('status', '1')->get()->count();

        $hargatotal = Transaksi::select(DB::raw("CAST(SUM(hargatotal) as int) as hargatotal"))
            ->GroupBy(DB::raw("Month(created_at)"))
            ->pluck('hargatotal');

        $bulan = Transaksi::select(DB::raw("MONTHNAME(created_at) as bulan"))
            ->GroupBy(DB::raw("MONTHNAME(created_at)"))
            ->pluck('bulan');

        $hargatotal1 = Transaksi::select(DB::raw("CAST(SUM(hargatotal) as int) as hargatotal"))
            ->GroupBy(DB::raw("Day(created_at)"))
            ->pluck('hargatotal');

        $harian = Transaksi::select(DB::raw("DAYNAME(created_at) as harian"))
            ->GroupBy(DB::raw("DAYNAME(created_at)"))
            ->pluck('harian');
        return view('dashboard', compact('transaksi', 'customer', 'hargatotal', 'hargatotal1', 'bulan', 'harian'));
    }

    public function add(Request $request){

    }

    public function store(Request $request){
        Transaksi::create([
            'id_cust' => $request->id_cust,
            'id_jenis' => $request->id_jenis,
            'id_cab' => $request->id_cab,
            'id_bayar' => $request->id_bayar,
            'jumlah' => $request->jumlah,
            'hargatotal' => $request->hargatotal,
        ]);

        return redirect()->route('transaksi')->with('status','Data sukses input');
    }



    public function update(Request $request, $id){
        $transaksi = Transaksi::find($id);
        $transaksi->id_cust = $request->id_cust;
        $transaksi->id_jenis = $request->id_jenis;
        $transaksi->id_cab = $request->id_cab;
        $transaksi->id_bayar = $request->id_bayar;
        $transaksi->jumlah = $request->jumlah;
        $transaksi->hargatotal = $request->hargatotal;
        $transaksi->save();

        return redirect()->route('transaksi')->with('status','Data sukses input');
    }

    public function deltran($id){
        $tran = Transaksi::where('id_trans',$id)->delete();
        return redirect()->route('transaksi')->with('success','Data uda di hapus bro');
    }

    public function export_excel()
    {
        return Excel::download(new TransaksiExport, 'transaksi.xlsx');
    }

}
