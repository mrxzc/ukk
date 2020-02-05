@extends('layouts.admin')
@section('content')
<div class="content-body" style="margin-top:20px;">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col p-md-0">
                <h4>Tambah Role</h4>
            </div>
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    </li>
                    <!-- <li class="breadcrumb-item"><a href="javascript:void()">Forms</a>
                            </li> -->
                    <li class="breadcrumb-item active">Tambah Role
                    </li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card forms-card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Tambah Role</h4>
                        <div class="basic-form">
                            <form action="{{route('level_proses_tambah')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="text-label">Nama Role</label>
                                    <input type="text" name="nama_level" class="form-control" placeholder="Masukan Nama Role" required>
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