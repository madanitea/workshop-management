<?php

namespace App\Http\Controllers;

use App\User;
use App\Suku_cadang;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SparepartController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    public function show(){
        $halaman = "Data Suku Cadang";
        $sparepart   = Suku_cadang::orderBy('id','desc')->get();
        $banyak = count($sparepart);
        $jumlah = Suku_cadang::sum('jumlah');
        $get = Suku_cadang::all();
        $total = 0;
        foreach ($get as $gets) {
            $jmlh = $gets->jumlah;
            $harga = $gets->harga;
            $aset = $jmlh * $harga;
            $total = $total + $aset;
        }
        return view('data_sparepart', compact('halaman','banyak','sparepart','jumlah','total'));
    }
    public function get(){
        $sparepart   = Suku_cadang::orderBy('id','desc')->get();
        return json_encode($sparepart);
    }
    public function destroy($id){
        $alat = Suku_cadang::findOrFail($id);
        $alat->delete();
        return redirect('sparepart');
    }
    public function create(){
        $halaman = "Tambah Suku Cadang";
        $suku_cadang   = Suku_cadang::orderBy('id','desc')->take(4)->get();
        return view('sparepart_add', compact('halaman', 'suku_cadang'));
    }
    public function update($id, Request $request){
        $suku_cadang = Suku_cadang::findOrFail($id);
        $suku_cadang->nama    = $request->nama;
        $suku_cadang->merk         = $request->merk;
        $suku_cadang->no_suku_cadang       = $request->no_suku_cadang;  
        $suku_cadang->jumlah       = $request->jumlah;
        $suku_cadang->ket          = $request->ket;
        $suku_cadang->harga        = $request->harga;
        $suku_cadang->untuk_motor       = $request->untuk_motor;
        $suku_cadang->update();
        return redirect('sparepart');
    }
    public function store(Request $request){
        $suku_cadang = new Suku_cadang;
        $suku_cadang->nama         = $request->nama;
        $suku_cadang->merk         = $request->merk;
        $suku_cadang->untuk_motor  = $request->untuk_motor;
        $suku_cadang->harga        = $request->harga;
        $suku_cadang->jumlah       = $request->jumlah;
        $suku_cadang->ket          = $request->ket;
        $suku_cadang->no_suku_cadang = $request->no_suku_cadang;
        $suku_cadang->status       = "Tersedia";
        if(!$suku_cadang->save()){
            return redirect('sparepart/tambah');
        }else{
            return redirect('sparepart/tambah');
        }
    }
}