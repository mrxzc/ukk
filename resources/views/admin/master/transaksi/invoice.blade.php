@extends('layouts.admin')
@section('content')
<style>
    @media print{
        body * { visibility:hidden}
        .print-area, .print-area * {visibility: visible}
        .print-area { position:absolute; left:0; top:0;}
    }
</style>
<div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col p-md-0">
                        <h4>Invoice</h4>
                    </div>
                    <div class="col p-md-0">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                            </li>
                            <!-- <li class="breadcrumb-item"><a href="javascript:void()">Forms</a>
                            </li> -->
                            <li class="breadcrumb-item active">Invoice
                            </li>
                        </ol>
                    </div>
                </div>

                @if($message = Session::get('sukses'))
                <div class="alert alert-primary alert-dismissible fade show" style="margin-top:20px;">
                    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button> <strong>{{$message}}</strong></div>
                @endif

                <div class="row" style="margin-top:20px;">
                    <div class="col-xl-12">
                        <div class="col-lg-12">
                            <div class="card button-card">
                                <div class="card-body">
                                    {{-- <h4 class="card-title card-intro-title">Button with icons</h4> --}}
                                    <center>
                                    <div class="button-icon">
                                        <a class="btn btn-rounded btn-warning" onclick="window.print()"><span class="flaticon-shapes"> </span>Cetak</a>
                                       
                                    </div>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row print-area">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">

                                <div>
                                @foreach($transaksi as $transaksis)
                                <h3>Order ID : <b>{{$transaksis->order_id}}</b></h3>
                                @endforeach
                                
                                </div>

                                <div style="margin-top:10px">
                                @foreach($transaksi as $transaksis)
                                 @foreach($user as $users)
                                 @if($transaksis->user_id == $users->id)
                                <h5>Pemesan : <b>{{$users->nama_user}}</b></b></h5>
                                 @endif
                                 @endforeach
                                @endforeach
                                
                                </div>

                                <div style="margin-top:10px">
                                @foreach($order as $orders)
                              
                                <h5>No Meja : <b>{{$orders->no_meja}}</b></h5>
                                
                                @endforeach
                                
                                </div>

                                <div style="margin-top:10px">
                                @foreach($transaksi as $transaksis)
                                <h5>Saldo :  <b>Rp. {{$transaksis->saldo}}</b></h5>
                                @endforeach
                                
                                </div>

                                <div style="margin-top:10px">
                                @foreach($transaksi as $transaksis)
                                <h5>Kembalian :  <b>Rp. {{$transaksis->kembalian}}</b></h5>
                                @endforeach
                                
                                </div>

                               
                                <table  id="datatable" class="display table table-striped table-hover" cellspacing="0" width="100%">
                                       <thead>
                                        <tr>
                                            <th>Makanan</th>
                                            <th>Jumlah</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                  <tbody>
                                  @foreach($detailorder as $detailorders)
                                 
                                  <tr>
                                    @foreach($masakan as $masakans)
                                     @if($detailorders->masakan_id == $masakans->id)
                                      <td>{{$masakans->nama_masakan}}</td>
                                     @endif
                                    @endforeach
                                
                                    <td>{{$detailorders->jumlah}}</td>
                                    <td>Rp. {{$detailorders->harga}}</td>
                                  </tr>
                                  @endforeach
                                  </tbody>

                                  <tfoot>
                                  @foreach($transaksi as $transaksis)
                                    <tr>
                                      <td></td>
                                      <td>Total</td>
                                      <td>Rp. {{$transaksis->total_bayar}}</td>
                                    </tr>
                                    @endforeach
                                  </tfoot>

                                
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
@section('js')

<script src="/gleek/gleek/assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="/gleek/gleek/main/js/plugins-init/datatables.init.js"></script>
@endsection
@endsection