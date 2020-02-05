<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class OPenggunaController extends Controller
{
    public function pengguna() {
    	$pengguna = User::all();
    	return view('owner.master.pengguna.index', compact('pengguna'));
    }

    public function tambah() {
    	$pengguna = User::all();
    	return view('owner.master.pengguna.tambah', compact('pengguna'));
    }

    public function proses_tambah(Request $r) {
		$pengguna = new User;
		$pengguna->username = $r->username;
    	$pengguna->nama_user = $r->nama_user;
    	$pengguna->email = $r->email;
    	$pengguna->password = bcrypt($r->password);
    	$pengguna->level_id = $r->level_id;
    	$pengguna->save();
    	return redirect(route('pengguna'))->with('sukses', 'Data Berhasil Ditambah!');
    }

    public function edit($id) {
    	return view('owner.master.pengguna.edit');
    }

    public function detail($id) {
    	$pengguna = User::find($id);	
    	return view('owner.master.pengguna.detail', compact('pengguna'));
    }

    public function proses_detail(Request $r) {
    	$pengguna = User::find($r->id);
    	$pengguna->nama_user = $r->nama_user;
    	$pengguna->email = $r->email;
    	$pengguna->level_id = $r->level_id;
    	$pengguna->password = bcrypt($r->password);

    	if($r->level_id){
    		$pengguna->level_id = $r->level_id;
    	}
    	$pengguna->save();
		return redirect(route('pengguna'))->with('sukses', 'Data Berhasil Diubah!');
    }

    public function hapus($id) {
    	$pengguna = User::find($id);
    	$pengguna->delete();
    	return redirect(route('pengguna'))->with('sukses', 'Data Berhasil Dihapus!');
    }
}
