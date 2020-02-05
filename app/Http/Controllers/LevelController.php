<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Level;

class LevelController extends Controller
{
    public function level() {
    	$level = Level::all();
    	return view('admin.master.level.index', compact('level'));
    }

    public function tambah() {
    	$level = Level::all();
    	return view('admin.master.level.tambah', compact('level'));
    }

    public function proses_tambah(Request $r) {
    	$level = new Level;
    	$level->nama_level = $r->nama_level;
    	$level->save();
    	return redirect(route('level'))->with('sukses', 'Data Berhasil Ditambah!');
    }

}
