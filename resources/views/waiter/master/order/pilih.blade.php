@extends('layouts.waiter')
@section('content')
    <style>
    .invoice-box {
        max-width: 100%;
        margin: auto;
        padding: 30px;
        /*border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);*/
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col p-md-0">
                        <h4>Order</h4>
                    </div>
                    <div class="col p-md-0">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                            </li>
                            <li class="breadcrumb-item active">
                                <a href="">Order</a>
                            </li>
                        </ol>
                    </div>
                </div>

                @if($message = Session::get('sukses'))
                <div class="alert alert-primary alert-dismissible fade show"  style="margin-top:20px;">
                    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button> <strong>{{$message}}</strong></div>
                @endif

                    <div class="col-12" style="margin-top:20px;">
                        <div class="card forms-card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Order</h4>
                                <div class="basic-form">
                                    <div class="invoice-box">
                                        <div class="form-group">
                                            <form action="{{route('pilihmenu_proses')}}" method="POST">
                                                @csrf
                                            <label class="text-label">Masakan*</label>
                                            <select name="masakan_id" class="form-control" placeholder="Masukkan Unit Produk" required>
                                                <option value="0">Pilih Produk</option>
                                                @foreach($masakan as $masakans)
                                                <option value="{{$masakans->id}}">{{$masakans->nama_masakan}} - Rp. {{$masakans->harga}}</option>
                                                @endforeach
                                            </select>
                                            <div>
                                            <input type="number" name="jumlah" class="form-control" placeholder="Masukkan Jumlah" required>
                                            </div>
                                                <div><br>   
                                                    <div class="button-icon">
                                                        <button type="submit" class="btn btn-rounded btn-info"><span class="flaticon-add"> </span>Add</button>
                                                    </div>
                                                </div><br>
                                                </form>
        <form>
        <table cellpadding="0" cellspacing="0">
            
            <tr class="heading">
            </tr>
                <!-- <td>
                    1000
                </td> -->
            
            <tr class="heading">
                <td>
                    Item
                </td>
                
                <td>
                   Action
                </td>

                <td>
                    Price
                </td>

                
            </tr>
            
            @foreach($detailorder as $detailorders)
         
            <tr class="item">
                @foreach($masakan as $masakans)
                @if($detailorders->masakan_id == $masakans->id)
                <td>
                    {{$masakans->nama_masakan}}  x{{$detailorders->jumlah}}
                </td>
                @endif
                @endforeach
                
                <td>
                    <a href="{{route('pilihmenu_hapus', $detailorders->id)}}">Batal</a>
                </td>

                <td>
                    Rp. {{$detailorders->harga}}
                </td>
            </tr>

            @endforeach

            
            <tr class="total">
            
                <td></td>
                <td>Total</td>
                
                @if($detailorder)
                <td>
                  <strong> Rp. {{$detailorder->sum('harga')}}  </strong>
                </td>
                @else
                <td>
                   Rp. 0
                </td>
                @endif
                <td>
               
                </td>
            </tr>
            
            <tr class="total">
                <td></td>
                
                <td>
               
                            <div class="card-body">
                                <div class="button-icon">
                                    <a href="{{route('pilihmenu_checkout')}}" class="btn btn-primary">Checkout<span class="btn-icon-right"><i class="fa fa-shopping-cart"></i></span></a>
                                  
                                </div>
                            </div>
                </td>
            </tr>
        </table>
        </form>
    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
@endsection