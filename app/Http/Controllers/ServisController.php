<?php

namespace App\Http\Controllers;

use App\User;
use App\Servis;
use App\Suku_cadang;
use App\Detail_servis;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServisController extends Controller
{
    public function store(Request $request){
        $servis = new Servis;
        $servis->no_plat    = $request->no_plat;
        $servis->tanggal_mulai = date(now());
        $servis->status       = "sedang";
        $servis->save();
        return "Servis motor ".$request->no_plat." berhasil ditambahkan !";
    }
    public function show(){
        $servis   = Servis::orderBy('tanggal_mulai','asc')->where('status','=','sedang')->get();
        return json_encode($servis);
    }
    public function destroy($id){
        $servis = Servis::findOrFail($id);
        $spareparts = Detail_servis::where('id_servis','=',$id)->get();
        foreach ($spareparts as $sparepart) {
        	$id_sparepart = $sparepart->id_suku_cadang;
        	$suku_cadang = Suku_cadang::findOrFail($id_sparepart);
        	$jumlah_asal = $suku_cadang->jumlah;
        	$jumlah_baru = $jumlah_asal + $sparepart->kuantitas;
        	$suku_cadang->jumlah = $jumlah_baru;
        	$suku_cadang->update();
        }
        $detail = Detail_servis::where('id_servis','=',$id)->delete();
        $servis->delete();
        return redirect('dashboard');
    }
    public function addsparepart(Request $request){
    	$sparepart = Suku_cadang::findOrFail($request->id_sparepart);
    	$harga = $sparepart->harga;
    	$total = $request->kuantitas * $harga;
    	$jumlah = $sparepart->jumlah;
    	$jumlah = $jumlah - $request->kuantitas;
    	$sparepart->jumlah = $jumlah;
    	$sparepart->update();
    	$detail = new Detail_servis;
    	$detail->id_servis = $request->id_servis;
    	$detail->id_suku_cadang = $request->id_sparepart;
    	$detail->kuantitas = $request->kuantitas;
    	$detail->total_harga = $total;
    	$detail->status = "Dibeli";
    	$detail->save();
    	$serviss = Detail_servis::where('id_servis','=',$request->id_servis)->get();
    	$total_sparepart = 0;
    	foreach ($serviss as $servis) {
    		$total_sparepart += $servis->total_harga;
    	}
    	$harga_sparepart = Servis::findOrFail($request->id_servis);
    	$harga_sparepart->total_harga_suku_cadang = $total_sparepart;
    	$harga_sparepart->update();
    	return "Sparepart berhasil ditambahkan !";
    }
    public function servisdetail($id){
    	$detail = Detail_servis::join('suku_cadang','suku_cadang.id','=','detail_servis.id_suku_cadang')->select('detail_servis.id','suku_cadang.nama','suku_cadang.merk','detail_servis.kuantitas','suku_cadang.harga','detail_servis.total_harga')->where('detail_servis.id_servis','=',$id)->get();
    	return json_encode($detail);
    }
    public function total_harga($id){
    	$total = Servis::findOrFail($id);
    	$total_harga = $total->total_harga_suku_cadang;
    	return $total_harga;
    }
    public function servisdetail_destroy($id){
    	$detail = Detail_servis::findOrFail($id);
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
    public function riwayat_servis(){
    	$halaman = "Riwayat Servis";
    	$serviss = Servis::orderBy('id','desc')->where('status','=','selesai')->get();
    	$banyak_today = Servis::whereDay('tanggal_selesai','=',date('d'),'and','status','=','selesai')->count();
    	$jasa_today = Servis::whereDay('tanggal_selesai','=',date('d'),'and','status','=','selesai')->sum('biaya_servis');
    	$jasa_thismonth = Servis::wheremonth('tanggal_selesai','=',date('m'),'and','status','=','selesai')->sum('biaya_servis');
    	$jasa_avgmonth = Servis::wheremonth('tanggal_selesai','=',date('m'),'and','status','=','selesai')->avg('biaya_servis');
    	$bulan_lalu = idate('m')-1;
        $jasa_avglastmonth = Servis::wheremonth('tanggal_selesai','=',$bulan_lalu,'and','status','=','selesai')->avg('biaya_servis');
        $change = $jasa_avgmonth - $jasa_avglastmonth;
        return view('riwayat_servis', compact('halaman','serviss','banyak_today','jasa_today','jasa_thismonth','jasa_avgmonth','change'));
    }
    public function riwayat_servis_delete($id){
    	$servis = Servis::findOrFail($id)->delete();
    	$detail = Detail_servis::where('id_servis','=',$id)->delete();
    	return 'sukses';
    }
    public function selesai(Request $request){
    	$jasa = $request->jasa;
    	$total = $request->total;
    	$uang = $request->uang;
    	$kembalian = $request->kembalian;
    	$id = $request->id;
    	$data = Servis::findOrFail($id);
    	$data->biaya_servis = $jasa;
    	$data->total_harga = $total;
    	$data->uang = $uang;
    	$data->kembalian = $kembalian;
    	$data->status = "selesai";
    	$data->tanggal_selesai = date(now());
    	$data->update();
    	return redirect('dashboard');
    }
}
