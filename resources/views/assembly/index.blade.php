@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Pembentukan Pintu</h2>
    <hr>
    <a href = "/assembly/create" class="btn btn-primary" style="margin-top:10px;margin-bottom:15px;">Buat Tiket</a> <br>

    @foreach($assemblies->unique('ass_name') as $assembly)
    <div class = "panel-group">
        <div class="panel panel-info">
           <div class="panel-heading">
               <h1>{{$assembly->ass_name}}</h1>
           </div>
           <div class="panel-body">
               <div class="row">
                   <div class="col-lg-3">
                       <label>Tanggal : </label>
                   <p style="font-weight: bold">{{$assembly->ass_name}}</p>
                   </div>
                   <div class="col-lg-3">
                       <label>Order Pembelian : </label>
                       <p style="font-weight: bold">{{$assembly->ass_name}}</p>
                    </div>
                    <div class="col-lg-3">
                           <label>Perkiraan Pengiriman : </label>
                           <p style="font-weight: bold">{{$assembly->ass_name}}</p>
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
               <a href ="assembly/{{$assembly->ass_number}}" class="btn btn-info">Manage</a>
                  <div class="col-md-offset-10">
                   Created by ary
               </div> 
           </div>
        </div>
    </div>
    @endforeach
</div>


@endsection