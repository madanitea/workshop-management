<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class SparepartController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    public function show(){
        $halaman = "show_sparepart";
        return view('data_sparepart', compact('halaman'));
    }
    public function create(){
        $halaman = "add_sparepart";
        return view('sparepart_add', compact('halaman'));
    }
}