<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        if(Auth::id()){

            $usertype=Auth()->user()->userType;

            if($usertype=='User'){
                return view('dashboard')->with('success', 'Anda Berhasil Login Sebagai User');
            } else if($usertype=='Admin'){
                return view('admin.adminhome')->with('success', 'Anda Berhasil Login Sebagai Admin');
            } else {
                return redirect()->back();
            }
        }
    }

    public function post(){
        return view('admin.post');
    }

}
