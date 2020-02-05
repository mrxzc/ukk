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
                        <h4>Transaksi</h4>
                    </div>
                    <div class="col p-md-0">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                            </li>
                            <!-- <li class="breadcrumb-item"><a href="javascript:void()">Forms</a>
                            </li> -->
                            <li class="breadcrumb-item active">Transaksi
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
                                        <a onclick="window.print()" class="btn btn-rounded btn-warning"><span class="flaticon-shapes"> </span>Cetak</a>
                                    </div>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row print-area" >
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                            <div class="table-responsive">
	<table id="datatable" class="display table table-striped table-hover" cellspacing="0" width="100%">
    <thead>
            <tr>
                <th>No</th>
                <th>ID Order</th>
                <th>Tanggal</th>
                <th>Pemesan</th>
                <th>Total</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
     
            @foreach($transaksi as $transaksis)
              
            <tr>
            <td>{{$transaksis->id}}</td>
                <td>{{$transaksis->order_id}}</td>
                <td>{{$transaksis->tanggal}}</td>
                @foreach($user as $users)
                @if($transaksis->user_id == $users->id)
                <td>{{$users->nama_user}}</td>
                @endif
                @endforeach
                <td>Rp. {{$transaksis->total_bayar}}</td>
                @if($transaksis->status == "Belum Terbayar")
                <td style="color:red">{{$transaksis->status}}</td>
                <td><a href="{{route('transaksi_update', $transaksis->order_id)}}">Bayar</a></td>
                @else
                <td style="color:green">{{$transaksis->status}}</td>
                <td><a href="{{route('transaksi_detail', $transaksis->order_id)}}">Cek</a></td>
                @endif

           
                
            
            </tr>
            
            @endforeach
        </tbody>
	</table>
</div>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>

@endsection