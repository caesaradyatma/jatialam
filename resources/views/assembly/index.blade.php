@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Pembentukan Pintu</h2>
    <hr>
    <a href = "/assembly/create" class="btn btn-primary" style="margin-top:10px;margin-bottom:15px;">Buat Tiket</a> <br>

    <div class = "panel-group">
        <div class="panel panel-info">
           <div class="panel-heading">
               <h1>KODE ASSEMBLY</h1>
           </div>
           <div class="panel-body">
               <div class="row">
                   <div class="col-lg-3">
                       <label>Tanggal : </label>
                   <p style="font-weight: bold">02/08/2019</p>
                   </div>
                   <div class="col-lg-3">
                       <label>Order Pembelian : </label>
                       <p style="font-weight: bold">kipod</p>
                    </div>
                    <div class="col-lg-3">
                           <label>Perkiraan Pengiriman : </label>
                           <p style="font-weight: bold">DUMMY</p>
                        </div>
                    <div class="col-lg-3">
                           <label>Status : </label>
                           {{--
                           @if(ASD == 'approved')
                           <p style="font-weight: bold;  background-color: #d5f4e6">ASAD</p>
                           @elseif(ASD == 'pending')
                           <p style="font-weight: bold;  background-color: yellow">ASDAD</p>
                           @else
                           <p style="font-weight: bold;  background-color: #E98AA3">ASDASD</p>
                           @endif --}}

                   </div>
               </div>
           </div>
           <div class="panel-footer"> 
               <a href = "" class="btn btn-info">Manage</a>
                  <div class="col-md-offset-10">
                   Created by ary
               </div> 
           </div>
        </div>
    </div>
</div>
@endsection