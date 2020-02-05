<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Order;
use \App\User;
use \App\Masakan;
use \App\Detailorder;
use \App\Transaksi;
use Session;
use DB;

class OOrderController extends Controller
{
    public function order() {
        $order = Order::all();
        $user = User::where('level_id','5')->get();
    	return view('owner.master.order.index', compact('order','user'));
    }

    public function tambah() {
        $order = Order::all();
        $user = User::where('level_id','5')->get();
    	return view('owner.master.order.tambah', compact('order','user'));
    }

    public function proses_tambah(Request $r) {
        $order = new Order;
        $order->no_meja = $r->no_meja;
        $order->user_id = $r->user_id;
        $order->status_order  = "No";
        $f = $r->no_meja;
        $order->keterangan = "Untuk Meja No $f";
        $order->save();
        Session::put('kode', $order->id);
        Session::put('user', $order->user_id);
        return redirect(route('pilihmenu'))->with('sukses', 'Data Berhasil Diubah!');
        
    }

    public function edit($id) {
    	return view('owner.master.order.edit');
    }

    public function detail($id) {
    	$order = Order::find($id);	
    	return view('owner.master.order.detail', compact('order'));
    }

    public function proses_detail(Request $r) {
    	$order = Order::find($r->id);
        $order->harga = $r->harga;
        $order->stok = $r->stok;
        $order->status_order = $r->status_order;
    	$order->save();
		return redirect(route('order'))->with('sukses', 'Berhasil Memesan Meja!');
    }

    public function hapus($id) {
    	$order = Order::find($id);
    	$order->delete();
    	return redirect(route('order'))->with('sukses', 'Data Berhasil Dihapus!');
    }

    public function pilihmenu(){
        $masakan = Masakan::all();
        $detailorder = Detailorder::where('order_id', Session::get('kode'))->where('keterangan','No')->get();
   
        return view('owner.master.order.pilih', compact('masakan','detailorder'));
    }

    
    public function pilihmenu_proses(Request $r){
        
        

        $result = DB::table('masakans')->select('harga')->where('id', $r->masakan_id)->first();
      
        $masakan2 = Masakan::where('id',$r->masakan_id)->first();
        if($masakan2->stok == '0'){
            return redirect(route('pilihmenu'))->with('sukses', 'Stok Sudah Habis');
        }
        if($masakan2->stok < $r->jumlah){
            return redirect(route('pilihmenu'))->with('sukses', "Stok Tersisa $masakan2->stok");
        }
        $masakan2->stok -= $r->jumlah;
        $masakan2->save();
        $masakan = Masakan::All();
        $detailorder = Detailorder::where('order_id',Session::get('kode'))->where('keterangan','No')->get();

        $produk_cek = Detailorder::where('order_id', Session::get('kode'))->where('keterangan', 'No')->where('masakan_id',$r->masakan_id)->first();
        if($produk_cek == null){
            $detailorderx = new Detailorder;
            $detailorderx->order_id = Session::get('kode');
            $detailorderx->masakan_id = $r->masakan_id;
            $detailorderx->jumlah = $r->jumlah;
            $detailorderx->harga = $result->harga * $r->jumlah;
            $detailorderx->keterangan = "No";
            $detailorderx->status_detail_order = "No";
        }else{
            $detailorderx = Detailorder::where('order_id', Session::get('kode'))->where('keterangan', 'No')->where('masakan_id',$r->masakan_id)->first();
            $detailorderx->jumlah += $r->jumlah; 
            $detailorderx->harga += $result->harga * $r->jumlah;
        }

        
        $detailorderx->save();

        

        
        return redirect()->back()->with('sukses', 'Order Berhasil Ditambah!');
    }

    public function pilihmenu_hapus($id){
        $detailorder = Detailorder::find($id);
    	$detailorder->delete();
    	return redirect(route('pilihmenu'))->with('sukses', 'Menu Berhasil Dihapus!');
    }

    public function pilihmenu_checkout(){
        $aa = "Ready";

        $get = Detailorder::where('order_id', Session::get('kode'))->where('keterangan', 'No')->get();
        $total = $get->sum('harga');
        $detailorder = Detailorder::where('order_id', Session::get('kode'))->where('keterangan','No')->update(array('keterangan' => $aa ,'status_detail_order' => $aa));
         
        $transaksi = new Transaksi;
        $transaksi->user_id = Session::get('user');
        $transaksi->order_id = Session::get('kode');
        $transaksi->status = "Belum Terbayar";
        $transaksi->total_bayar = $total;
        $transaksi->save();
        Session::forget('user');
         Session::forget('kode');
         return redirect(route('order'))->with('sukses', 'Order Berhasil! Silahkan Lanjutkan Pembayaran');
        }

    public function transaksi(){
        $transaksi = Transaksi::All();
        $user = User::where('level_id','5')->get();
    	return view('owner.master.transaksi.index', compact('transaksi','user'));
    }

    public function transaksi_update($order_id){
        Session::put('kode2',$order_id);
        $transaksi = Transaksi::where('order_id',$order_id)->first();
        $order = Order::where('id',$order_id)->first();
        $user = User::where('level_id','5')->get();
        $detailorder = Detailorder::where('order_id',$order_id)->get();
        $masakan = Masakan::All();
        return view('owner.master.transaksi.detail', compact('masakan','transaksi','order','detailorder','user'));
      
    }

    public function transaksi_update_checkout(Request $r){
        $aa = "Ready";
        $transaksi = Transaksi::where('order_id',Session::get('kode2'))->first();
        if($transaksi->total_bayar > $r->saldo){
            return redirect()->back()->with('sukses', 'Saldo Anda Kurang!');
        }
        if($r->saldo == 0){
            return redirect()->back()->with('sukses', 'Masukan Saldo!');
        }
        $transaksi->saldo = $r->saldo;
        $transaksi->kembalian = $r->saldo - $transaksi->total_bayar;
        $transaksi->metode = $r->metode;
        $transaksi->status = "Sudah Terbayar";
        $transaksi->save();

        $order = Order::where('id', Session::get('kode2'))->where('status_order','No')->update(array('status_order' => $aa));
        return redirect(route('transaksi'))->with('sukses', 'Transaksi Berhasil!');
        Session::forget('kode2');
    }

    public function transaksi_detail($order_id){ 
        $transaksi = Transaksi::where('order_id',$order_id)->get();
        $order = Order::where('id',$order_id)->get();
        $user = User::where('level_id','5')->get();
        $detailorder = Detailorder::where('order_id',$order_id)->get();
        $masakan = Masakan::All();
        return view('owner.master.transaksi.invoice', compact('masakan','transaksi','order','detailorder','user'));
    }


}
