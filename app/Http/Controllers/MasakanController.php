<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Masakan;

class MasakanController extends Controller
{
    public function masakan() {
    	$masakan = Masakan::all();
    	return view('admin.master.masakan.index', compact('masakan'));
    }

    public function tambah() {
    	$masakan = Masakan::all();
    	return view('admin.master.masakan.tambah', compact('masakan'));
    }

    public function proses_tambah(Request $r) {
		$masakan = new Masakan;
        $masakan->nama_masakan = $r->nama_masakan;
        $masakan->harga = $r->harga;
        $masakan->stok = $r->stok;
        $masakan->status_masakan = "Tersedia";
    	$masakan->save();
    	return redirect(route('masakan'))->with('sukses', 'Data Berhasil Ditambah!');
    }

    public function edit($id) {
    	return view('admin.master.masakan.edit');
    }

    public function detail($id) {
    	$masakan = Masakan::find($id);	
    	return view('admin.master.masakan.detail', compact('masakan'));
    }

    public function proses_detail(Request $r) {
    	$masakan = Masakan::find($r->id);
        $masakan->harga = $r->harga;
        $masakan->stok = $r->stok;
        $masakan->status_masakan = $r->status_masakan;
    	$masakan->save();
		return redirect(route('masakan'))->with('sukses', 'Data Berhasil Diubah!');
    }

    public function hapus($id) {
    	$masakan = Masakan::find($id);
    	$masakan->delete();
    	return redirect(route('masakan'))->with('sukses', 'Data Berhasil Dihapus!');
    }
}
