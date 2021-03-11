<?php

namespace App\Http\Controllers;

use App\User;
use App\Penjualan;
use App\Suku_cadang;
use App\Detail_penjualan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function store(Request $request){
        $jual = new Penjualan;
        if($request->ket !== NULL){
        	$jual->ket    = $request->ket;	
        }
        $jual->status       = "keranjang";
        $jual->save();
        return $jual;
    }
    public function show(){
        $jual = Penjualan::orderBy('id','asc')->where('status','=','keranjang')->get();
        return json_encode($jual);
    }
    public function destroy($id){
        $penjualan = Penjualan::findOrFail($id);
        $spareparts = Detail_penjualan::where('id_penjualan','=',$id)->get();
        foreach ($spareparts as $sparepart) {
        	$id_sparepart = $sparepart->id_suku_cadang;
        	$suku_cadang = Suku_cadang::findOrFail($id_sparepart);
        	$jumlah_asal = $suku_cadang->jumlah;
        	$jumlah_baru = $jumlah_asal + $sparepart->kuantitas;
        	$suku_cadang->jumlah = $jumlah_baru;
        	$suku_cadang->update();
        }
        $detail = Detail_penjualan::where('id_penjualan','=',$id)->delete();
        $penjualan->delete();
        return $penjualan;
    }
    public function addsparepart(Request $request){
    	$sparepart = Suku_cadang::findOrFail($request->id_sparepart);
    	$harga = $sparepart->harga;
    	$total = $request->kuantitas * $harga;
    	$jumlah = $sparepart->jumlah;
    	$jumlah = $jumlah - $request->kuantitas;
    	$sparepart->jumlah = $jumlah;
    	$sparepart->update();
    	$detail = new Detail_penjualan;
    	$detail->id_penjualan = $request->id_jual;
    	$detail->id_suku_cadang = $request->id_sparepart;
    	$detail->kuantitas = $request->kuantitas;
    	$detail->total_harga = $total;
    	$detail->status = "Dibeli";
    	$detail->save();
    	$serviss = Detail_penjualan::where('id_penjualan','=',$request->id_jual)->get();
    	$total_sparepart = 0;
    	foreach ($serviss as $servis) {
    		$total_sparepart += $servis->total_harga;
    	}
    	$harga_sparepart = Penjualan::findOrFail($request->id_jual);
    	$harga_sparepart->total_harga = $total_sparepart;
    	$harga_sparepart->update();
    	return ;
    }
    public function jualdetail($id){
    	$detail = Detail_penjualan::join('suku_cadang','suku_cadang.id','=','detail_penjualan.id_suku_cadang')->select('detail_penjualan.id','suku_cadang.nama','suku_cadang.merk','detail_penjualan.kuantitas','suku_cadang.harga','detail_penjualan.total_harga')->where('detail_penjualan.id_penjualan','=',$id)->get();
    	return json_encode($detail);
    }
    public function total_harga($id){
    	$total = Penjualan::findOrFail($id);
    	$total_harga = $total->total_harga;
    	return $total_harga;
    }
    public function jualdetail_destroy($id){
    	$detail = Detail_penjualan::findOrFail($id);
    	$qty = $detail->kuantitas;
    	$id_sparepart = $detail->id_suku_cadang;
    	$sparepart = Suku_cadang::findOrFail($id_sparepart);
    	$last = $sparepart->jumlah;
    	$newest = $qty + $last;
    	$update = Suku_cadang::findOrFail($id_sparepart);
    	$update->jumlah = $newest;
    	$update->update();
    	$detail->delete();
    	return "Jumlah baru ".$sparepart->nama." merk ".$sparepart->merk." adalah ".$newest;
    }
    public function riwayat_jual(){
    	$halaman = "Riwayat Penjualan";
    	$serviss = Penjualan::orderBy('id','desc')->where('status','=','deal')->get();
    	$banyak_today = Penjualan::whereDay('updated_at','=',date('d'),'and','status','=','deal')->count();
    	$jasa_today = Penjualan::whereDay('updated_at','=',date('d'),'and','status','=','deal')->sum('total_harga');
    	$jasa_thismonth = Penjualan::wheremonth('updated_at','=',date('m'),'and','status','=','deal')->sum('total_harga');
    	$jasa_avgmonth = Penjualan::wheremonth('updated_at','=',date('m'),'and','status','=','deal')->avg('total_harga');
    	$bulan_lalu = idate('m')-1;
        $jasa_avglastmonth = Penjualan::wheremonth('updated_at','=',$bulan_lalu,'and','status','=','deal')->avg('total_harga');
        $change = $jasa_avgmonth - $jasa_avglastmonth;
        return view('riwayat_penjualan', compact('halaman','serviss','banyak_today','jasa_today','jasa_thismonth','jasa_avgmonth','change'));
    }
    // public function riwayat_servis_delete($id){
    // 	$servis = Servis::findOrFail($id)->delete();
    // 	$detail = Detail_servis::where('id_servis','=',$id)->delete();
    // 	return 'sukses';
    // }
    public function selesai(Request $request){
    	$total = $request->total;
    	$uang = $request->uang;
    	$kembalian = $request->kembalian;
    	$id = $request->id;
    	$data = Penjualan::findOrFail($id);
    	$data->total_harga = $total;
    	$data->uang = $uang;
    	$data->kembalian = $kembalian;
    	$data->status = "deal";
    	$data->update();
    	return redirect('dashboard');
    }
}
