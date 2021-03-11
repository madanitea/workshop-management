<?php

namespace App\Http\Controllers;

use App\User;
use App\Alat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PeralatanController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    public function show(){
        $halaman = "Data Alat";
        $alats   = Alat::orderBy('id','desc')->get();
        $banyak = count($alats);
        $jumlah = Alat::sum('jumlah');
        $get = Alat::all();
        $total = 0;
        foreach ($get as $gets) {
            $jmlh = $gets->jumlah;
            $harga = $gets->harga;
            $aset = $jmlh * $harga;
            $total = $total + $aset;
        }
        return view('data_tools', compact('halaman','alats','banyak','jumlah','total'));
    }
    public function create(){
        $halaman = "Tambah Alat";
        $alats   = Alat::orderBy('id','desc')->take(4)->get();
        return view('tools_add', compact('halaman', 'alats'));
    }
    public function destroy($id){
        $alat = Alat::findOrFail($id);
        $alat->delete();
        return redirect('tools');
    }
    public function update($id, Request $request){
        $alat = Alat::findOrFail($id);
        $alat->nama_alat    = $request->nama_alat;
        $alat->merk         = $request->merk;
        $alat->tempat       = $request->tempat;
        $alat->jumlah       = $request->jumlah;
        $alat->ket          = $request->ket;
        $alat->harga        = $request->harga;
        $alat->status       = $request->status;
        $alat->update();
        return redirect('tools');
    }
    public function store(Request $request){
        $alat = new Alat;
        $alat->nama_alat    = $request->nama_alat;
        $alat->merk         = $request->merk;
        $alat->tanggal_beli = date(now());
        $alat->tempat       = $request->tempat;
        $alat->jumlah       = $request->jumlah;
        $alat->ket          = $request->ket;
        $alat->harga        = $request->harga;
        $alat->status       = "Baik";
        if(!$alat->save()){
            return redirect('tools/tambah');
        }else{
            return redirect('tools/tambah');
        }
    }
}