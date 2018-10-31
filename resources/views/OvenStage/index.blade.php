@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Oven Stage</h1>

        <table class="table table-striped">
            <tr>
                <th>Reference ID</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Status</th>
            </tr>
            @foreach($ovens as $oven)
                <tr>
                    <td><a href="ovens/{{$oven->reference_id}}">{{$oven->reference_id}}</a></td>
                <!--    <td>{{$oven->open_produk->cat_name}} {{$oven->open_produk->cat_measurement}}</td> -->
                    <td>{{$oven->amount}}</td>
                    <td>{{$oven->oven_status->name}}</td>
             
                </tr>
            @endforeach
        </table>
    </div>

@endsection