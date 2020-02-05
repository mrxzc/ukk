<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin')->group(function(){
	Route::get('/', 'AdminController@dashboard')->name('admin');
  

    Route::prefix('level')->group(function(){
		Route::get('/', 'LevelController@level')->name('level');

		Route::get('/tambah', 'LevelController@tambah')->name('level_tambah');
		Route::post('/proses-tambah', 'LevelController@proses_tambah')->name('level_proses_tambah');

	});


    Route::prefix('pengguna')->group(function(){
		Route::get('/', 'PenggunaController@pengguna')->name('pengguna');

		Route::get('/tambah', 'PenggunaController@tambah')->name('pengguna_tambah');
		Route::post('/proses-tambah', 'PenggunaController@proses_tambah')->name('pengguna_proses_tambah');

		Route::get('/detail/{id}', 'PenggunaController@detail')->name('pengguna_detail');
		Route::post('/proses_detail', 'PenggunaController@proses_detail')->name('pengguna_proses_detail');

		Route::get('/hapus/{id}', 'PenggunaController@hapus')->name('pengguna_hapus');
    });
    
    Route::prefix('masakan')->group(function(){
		Route::get('/', 'MasakanController@masakan')->name('masakan');

		Route::get('/tambah', 'MasakanController@tambah')->name('masakan_tambah');
		Route::post('/proses-tambah', 'MasakanController@proses_tambah')->name('masakan_proses_tambah');

		Route::get('/detail/{id}', 'MasakanController@detail')->name('masakan_detail');
		Route::post('/proses_detail', 'MasakanController@proses_detail')->name('masakan_proses_detail');

		Route::get('/hapus/{id}', 'MasakanController@hapus')->name('masakan_hapus');
    });

    Route::prefix('order')->group(function(){
		Route::get('/', 'OrderController@order')->name('order');

		Route::get('/tambah', 'OrderController@tambah')->name('order_tambah');
		Route::post('/proses-tambah', 'OrderController@proses_tambah')->name('order_proses_tambah');

		Route::get('/detail/{id}', 'OrderController@detail')->name('order_detail');
		Route::post('/proses_detail', 'OrderController@proses_detail')->name('order_proses_detail');

		Route::get('/hapus/{id}', 'OrderController@hapus')->name('order_hapus');
    });

    Route::prefix('pilihmenu')->group(function(){
        Route::get('/', 'OrderController@pilihmenu')->name('pilihmenu');
        
		Route::post('/pilihmenu_proses', 'OrderController@pilihmenu_proses')->name('pilihmenu_proses');
		Route::get('/pilihmenu_hapus/{id}', 'OrderController@pilihmenu_hapus')->name('pilihmenu_hapus');
		Route::get('/pilihmenu_checkout', 'OrderController@pilihmenu_checkout')->name('pilihmenu_checkout');

      
		
	});
	
	Route::prefix('transaksi')->group(function(){
        Route::get('/', 'OrderController@transaksi')->name('transaksi');
		Route::get('/transaksi_update/{order_id}', 'OrderController@transaksi_update')->name('transaksi_update');
		Route::post('/transaksi_update_checkout', 'OrderController@transaksi_update_checkout')->name('transaksi_update_checkout');
		Route::get('/transaksi_detail/{order_id}', 'OrderController@transaksi_detail')->name('transaksi_detail');
      
		
    });



    


});


Route::prefix('waiter')->group(function(){
	Route::get('/', 'WaiterController@dashboard')->name('admin');
  


    Route::prefix('order')->group(function(){
		Route::get('/', 'WOrderController@order')->name('order');

		Route::get('/tambah', 'WOrderController@tambah')->name('order_tambah');
		Route::post('/proses-tambah', 'WOrderController@proses_tambah')->name('order_proses_tambah');

		Route::get('/detail/{id}', 'WOrderController@detail')->name('order_detail');
		Route::post('/proses_detail', 'WOrderController@proses_detail')->name('order_proses_detail');

		Route::get('/hapus/{id}', 'WOrderController@hapus')->name('order_hapus');
    });

    Route::prefix('pilihmenu')->group(function(){
        Route::get('/', 'WOrderController@pilihmenu')->name('pilihmenu');
        
		Route::post('/pilihmenu_proses', 'WOrderController@pilihmenu_proses')->name('pilihmenu_proses');
		Route::get('/pilihmenu_hapus/{id}', 'WOrderController@pilihmenu_hapus')->name('pilihmenu_hapus');
		Route::get('/pilihmenu_checkout', 'WOrderController@pilihmenu_checkout')->name('pilihmenu_checkout');

      
		
	});




    


});

Route::prefix('kasir')->group(function(){
	Route::get('/', 'KasirController@dashboard')->name('kasir');
  

	Route::prefix('transaksi')->group(function(){
        Route::get('/', 'KOrderController@transaksi')->name('transaksi');
		Route::get('/transaksi_update/{order_id}', 'KOrderController@transaksi_update')->name('transaksi_update');
		Route::post('/transaksi_update_checkout', 'KOrderController@transaksi_update_checkout')->name('transaksi_update_checkout');
		Route::get('/transaksi_detail/{order_id}', 'KOrderController@transaksi_detail')->name('transaksi_detail');
      
		
    });



    


});

Route::prefix('owner')->group(function(){
	Route::get('/', 'OwnerController@dashboard')->name('owner');
  

    Route::prefix('pengguna')->group(function(){
		Route::get('/', 'OPenggunaController@pengguna')->name('pengguna');

		Route::get('/tambah', 'OPenggunaController@tambah')->name('pengguna_tambah');
		Route::post('/proses-tambah', 'OPenggunaController@proses_tambah')->name('pengguna_proses_tambah');

		Route::get('/detail/{id}', 'OPenggunaController@detail')->name('pengguna_detail');
		Route::post('/proses_detail', 'OPenggunaController@proses_detail')->name('pengguna_proses_detail');

		Route::get('/hapus/{id}', 'OPenggunaController@hapus')->name('pengguna_hapus');
    });
    
	Route::prefix('order')->group(function(){
		Route::get('/', 'OOrderController@order')->name('order');

		Route::get('/tambah', 'OOrderController@tambah')->name('order_tambah');
		Route::post('/proses-tambah', 'OOrderController@proses_tambah')->name('order_proses_tambah');

		Route::get('/detail/{id}', 'OOrderController@detail')->name('order_detail');
		Route::post('/proses_detail', 'OOrderController@proses_detail')->name('order_proses_detail');

		Route::get('/hapus/{id}', 'OOrderController@hapus')->name('order_hapus');
    });

	
	Route::prefix('transaksi')->group(function(){
        Route::get('/', 'OOrderController@transaksi')->name('transaksi');
		Route::get('/transaksi_update/{order_id}', 'OOrderController@transaksi_update')->name('transaksi_update');
		Route::post('/transaksi_update_checkout', 'OOrderController@transaksi_update_checkout')->name('transaksi_update_checkout');
		Route::get('/transaksi_detail/{order_id}', 'OOrderController@transaksi_detail')->name('transaksi_detail');
      
		
    });


});


Route::get('/', 'PagesController@login')->name('login');

Route::post('/proses_login', 'PagesController@proses_login')->name('proses_login');
Route::get('/register','PagesController@register')->name('register');
Route::post('/proses_register','PagesController@proses_register')->name('proses_register');

Route::get('/logout', 'PagesController@logout')->name('logout');