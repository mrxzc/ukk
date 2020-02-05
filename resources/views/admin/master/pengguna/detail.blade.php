@extends('layouts.admin')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col p-md-0">
                <h4>Edit Pengguna</h4>
            </div>
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    </li>
                    <!-- <li class="breadcrumb-item"><a href="javascript:void()">Forms</a>
                            </li> -->
                    <li class="breadcrumb-item active">Edit Pengguna
                    </li>
                </ol>
            </div>
        </div>

        @if($message = Session::get('sukses'))
        <div class="alert alert-primary alert-dismissible fade show">
            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
            </button> <strong>{{$message}}</strong>
        </div>
        @endif

        <div class="row">
            <div class="col-12">
                <div class="card forms-card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Edit Pengguna</h4>
                        <div class="basic-form">
                            <form action="{{route('pengguna_proses_detail')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="text-label">Nama*</label>
                                    <input type="hidden" name="id" value="{{$pengguna->id}}">
                                    <input type="text" name="nama_user" class="form-control" required value="{{$pengguna->nama_user}}">
                                </div>
                                <div class="form-group">
                                    <label class="text-label">Username*</label>
                                    <input type="hidden" name="id" value="{{$pengguna->id}}">
                                    <input type="text" name="username" class="form-control" required value="{{$pengguna->username}}">
                                </div>
                                <div class="form-group">
                                    <label class="text-label">Email*</label>
                                    <input type="email" name="email" class="form-control" required value="{{$pengguna->email}}">
                                </div>
                                <div class="form-group">
                                    <label class="text-label">Password*</label>
                                    <input type="password" name="password" class="form-control" placeholder="************">
                                </div>
                                <div class="form-group">
                                    <label class="text-label">Hak Akses*</label>
                                    <select name="level_id" class="form-control" required>
                                        @if($pengguna->level_id != null && $pengguna->level_id == '1')
                                        <option value="{{$pengguna->level_id}}">Admin</option>
                                        @elseif($pengguna->level_id != null && $pengguna->level_id == '2')
                                        <option value="{{$pengguna->level_id}}">Waiter</option>
                                        @elseif($pengguna->level_id != null && $pengguna->level_id == '3')
                                        <option value="{{$pengguna->level_id}}">Kasir</option>
                                        @elseif($pengguna->level_id != null && $pengguna->level_id == '4')
                                        <option value="{{$pengguna->level_id}}">Owner</option>
                                        @elseif($pengguna->level_id != null && $pengguna->level_id == '5')
                                        <option value="{{$pengguna->level_id}}">Pelanggan</option>
                                        @else
                                        <option value="">Pilih Hak Akses</option>
                                        @endif
                                        <option value="1">Admin</option>
                                        <option value="2">Waiter</option>
                                        <option value="3">Kasir</option>
                                        <option value="4">Owner</option>
                                        <option value="5">Pelanggan</option>
                                       
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary btn-form mr-2">Submit</button>
                                <button type="button" class="btn btn-light text-dark btn-form">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- #/ container -->
</div>
@endsection