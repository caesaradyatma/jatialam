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
                       <label>Tanggal Pembuatan: </label>
                   <p style="font-weight: bold">{{$assembly->creation_date}}</p>
                   </div>
                   <div class="col-lg-3">
                       <label>Produk Akhir : </label>
                       <p style="font-weight: bold">{{$assembly->ass_name}}</p>
                    </div>
                    <div class="col-lg-3">
                           <label>Perkiraan Penyelesaian : </label>
                           <p style="font-weight: bold">{{$assembly->final_date}}</p>
                        </div>
                    <div class="col-lg-3">
                           <label>Status : </label>
                           @if($assembly->ass_status == 'Selesai')
                           <p style="font-weight: bold;  background-color: #d5f4e6">Selesai</p>
                           @elseif($assembly->ass_status == 'Pending')
                           <p style="font-weight: bold;  background-color: yellow">Pending</p>
                           @else
                           <p style="font-weight: bold;  background-color: #E98AA3">Batal</p>
                           @endif
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