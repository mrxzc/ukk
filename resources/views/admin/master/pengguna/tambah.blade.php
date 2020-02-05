@extends('layouts.admin')
@section('content')
<div class="content-body" style="margin-top:20px;">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col p-md-0">
                <h4>Tambah Pengguna</h4>
            </div>
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                    </li>
                    <!-- <li class="breadcrumb-item"><a href="javascript:void()">Forms</a>
                            </li> -->
                    <li class="breadcrumb-item active">Tambah Pengguna
                    </li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card forms-card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Tambah Pengguna</h4>
                        <div class="basic-form">
                            <form action="{{route('pengguna_proses_tambah')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="text-label">Nama*</label>
                                    <input type="text" name="nama_user" class="form-control" placeholder="Masukan Nama" required>
                                </div>
                                <div class="form-group">
                                    <label class="text-label">Username*</label>
                                    <input type="text" name="username" class="form-control" placeholder="Masukan Username" required>
                                </div>
                                <div class="form-group">
                                    <label class="text-label">Email*</label>
                                    <input type="email" name="email" class="form-control" placeholder="Masukan Email" required>
                                </div>
                                <div class="form-group">
                                    <label class="text-label">Password*</label>
                                    <input type="password" name="password" class="form-control" placeholder="Masukan Password" required>
                                </div>
                                <div class="form-group">
                                    <label class="text-label">Hak Akses*</label>
                                    <select name="level_id" class="form-control" required>
                                        <option value="">Pilih Hak Akses</option>
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