<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public function relasiUser() {
    	return $this->belongsTo('App\User', 'id');
    }
    public function relasiMasakan() {
    	return $this->belongsTo('App\Masakan', 'id');
    }
    public function relasiDetail() {
    	return $this->belongsTo('App\Detailorder', 'id');
    }
    public function relasiTransaksi() {
    	return $this->belongsTo('App\Transaksi', 'id');
    }
}
