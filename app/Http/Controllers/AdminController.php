<?php

namespace App\Http\Controllers;

use App\User;
use App\Suku_cadang;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    public function index()
    {
        $halaman = "Dashboard";
        $spareparts   = Suku_cadang::orderBy('id','desc')->get();
        return view('dashboard', compact('halaman','spareparts'));
    }
    public function riwayat_penjualan()
    {
        $halaman = "Riwayat Penjualan";
        return view('riwayat_penjualan', compact('halaman'));
    }
    public function riwayat_servis()
    {
        $halaman = "Riwayat Servis";
        return view('riwayat_servis', compact('halaman'));
    }
}