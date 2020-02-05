@extends('layouts.admin')
@section('content')
<div class="content-body" style="margin-top:20px;">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col p-md-0">
                <h4>Order</h4>
            </div>
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    </li>
                    <!-- <li class="breadcrumb-item"><a href="javascript:void()">Forms</a>
                            </li> -->
                    <li class="breadcrumb-item active">Order
                    </li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card forms-card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Order</h4>
                        <div class="basic-form">
                            <form action="{{route('order_proses_tambah')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="text-label">Pemesan*</label>
                                    <select name="user_id" class="form-control" required>
                                    <option value="">Pemesan</option>
                                        @foreach($user as $users)
                                        <option value="{{$users->id}}">{{$users->nama_user}}</option>
                                        @endforeach
                                       
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="text-label">Meja*</label>
                                    <select name="no_meja" class="form-control" required placeholder="Pilih Meja">
                                        <option value=" ">Pilih Meja</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
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