@extends('layouts.admin')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col p-md-0">
                <h4>Edit Menu</h4>
            </div>
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    </li>
                    <!-- <li class="breadcrumb-item"><a href="javascript:void()">Forms</a>
                            </li> -->
                    <li class="breadcrumb-item active">Edit Menu
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
                        <h4 class="card-title mb-4">Edit Menu</h4>
                        <div class="basic-form">
                            <form action="{{route('masakan_proses_detail')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="text-label">Nama Masakan*</label>
                                    <input type="hidden" name="id" value="{{$masakan->id}}">
                                    <input type="text" name="nama_masakan" class="form-control" required value="{{$masakan->nama_masakan}}">
                                </div>
                                <div class="form-group">
                                    <label class="text-label">Harga*</label>
                                    <input type="hidden" name="id" value="{{$masakan->id}}">
                                    <input type="number" name="harga" class="form-control" required value="{{$masakan->harga}}">
                                </div>
                                <div class="form-group">
                                    <label class="text-label">Stok*</label>
                                    <input type="number" name="stok" class="form-control" required value="{{$masakan->stok}}">
                                </div>
    
                                <div class="form-group">
                                    <label class="text-label">Status*</label>
                                    <select name="status_masakan" class="form-control" required>
                                        @if($masakan->status_masakan != null && $masakan->status_masakan == 'Tersedia')
                                        <option value="{{$masakan->status_masakan}}">Tersedia</option>
                                        @elseif($masakan->status_masakan != null && $masakan->status_masakan == 'Habis')
                                        <option value="{{$masakan->status_masakan}}">Habis</option>
                                        @else
                                        <option value="">Pilih Hak Akses</option>
                                        @endif
                                        <option value="Tersedia">Tersedia</option>
                                        <option value="Habis">Habis</option>
                                       
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