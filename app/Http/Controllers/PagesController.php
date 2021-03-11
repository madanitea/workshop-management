<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    public function index()
    {
        return view('landing');
    }

    public function login()
    {
        return view('login');
    }
    public function proseslogin(Request $request){
        $email = "admin@gmail.com";
        $password = "admin";
        $fromemail = $request->email;
        $frompass = $request->password;
        if($fromemail == $email AND $frompass == $password){
            return redirect('dashboard');
        }else{
            return redirect('login');
        }
    }
}