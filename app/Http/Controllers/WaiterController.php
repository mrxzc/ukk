<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WaiterController extends Controller
{
    public function dashboard() {
    	return view('waiter.dashboard');
    }
}
