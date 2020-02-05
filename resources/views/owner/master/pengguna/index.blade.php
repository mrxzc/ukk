@extends('layouts.owner')
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
                        <h4>Pengguna</h4>
                    </div>
                    <div class="col p-md-0">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a>
                            </li>
                            <!-- <li class="breadcrumb-item"><a href="javascript:void()">Forms</a>
                            </li> -->
                            <li class="breadcrumb-item active">Pengguna
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
                                        <a href="{{route('pengguna_tambah')}}" class="btn btn-rounded btn-info"><span class="flaticon-add"> </span>Tambah Pengguna</a>
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
                <th>Nama</th>
                <th>Email</th>
                <th>Hak Akses</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pengguna as $penggunas)
            <tr>
            <td>{{$penggunas->id}}</td>
                <td>{{$penggunas->nama_user}}</td>
                <td>{{$penggunas->email}}</td>
                @if($penggunas->level_id == '1')
                <td>Admin</td>
                @elseif($penggunas->level_id == '2')
                <td>Waiter</td>
                @elseif($penggunas->level_id == '3')
                <td>Kasir</td>
                @elseif($penggunas->level_id == '4')
                <td>Owner</td>
                @else
                <td>Pelanggan</td>
                @endif
                <td><a href="{{route('pengguna_detail', $penggunas->id)}}">Update</a> || <a href="{{route('pengguna_hapus', $penggunas->id)}}" sytle="color:red;">Delete</a></td>
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