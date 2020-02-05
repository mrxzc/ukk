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
                        <h4>Menu</h4>
                    </div>
                    <div class="col p-md-0">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                            </li>
                            <!-- <li class="breadcrumb-item"><a href="javascript:void()">Forms</a>
                            </li> -->
                            <li class="breadcrumb-item active">Menu
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
                                        <a href="{{route('masakan_tambah')}}" class="btn btn-rounded btn-info"><span class="flaticon-add"> </span>Tambah Menu</a>
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
                <th>Nama Masakan</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
     
            @foreach($masakan as $masakans)
            <tr>
            <td>{{$masakans->id}}</td>
                <td>{{$masakans->nama_masakan}}</td>
                <td>Rp. {{$masakans->harga}}</td>
                <td>{{$masakans->stok}}</td>
                @if($masakans->stok == 0)
                  <td style="color:red">Habis</td>
                @else
                  <td style="color:green">Tersedia</td>
                @endif
                <td><a href="{{route('masakan_detail', $masakans->id)}}">Update</a></td>
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