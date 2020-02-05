<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Session;

class PagesController extends Controller
{
    public function login() {
    	return view('pages.login');
    }

    public function proses_login(Request $r) {
    	$email = $r->email;
    	$password = $r->password;
    	if (Auth::attempt(['email' => $email, 'password' => $password])){
    		if (Auth::user()->level_id == "1"){
                $nama = Auth::user()->nama_user;
       
                return redirect('/admin')->with('nama', $nama);;
    		}
    		if (Auth::user()->level_id == "2"){
    			return redirect('/waiter');
    		}
    		if (Auth::user()->level_id == "3"){
    			return redirect('/kasir');
            }
            if (Auth::user()->level_id == "4"){
    			return redirect('/owner');
            }
            if (Auth::user()->level_id == "5"){
    			return redirect('/pelanggan');
            }
            
    	}
    	return redirect(route('login'))->with('sukses', 'Email / Password Anda Salah!');
    }

    public function logout(){
        Auth::logout();
        return redirect('/')->with('sukses', 'Anda Berhasil Logout!');
    }

    public function register(){
        return view('pages.register');
    }

    public function proses_register(Request $r){   
        $user = new User;
        $user->nama_user = $r->nama_user;
        $user->email = $r->email;
        $user->password = bcrypt($r->password);
        $user->username = $r->username;
        $user->level_id = 5;
        $user->save();
        return redirect('/')->with('sukses', 'Anda Berhasil Register!');
    }
}
