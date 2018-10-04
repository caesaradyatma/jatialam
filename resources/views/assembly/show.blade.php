@extends('layouts.app')

@section('content')
<h1>Detail Data Pemotongan</h1>
    <table class="table">
        <tr>
            <th>Ref ID</th>
            <td>{{$ass_number}}</td>
        </tr>
    </table>

    <table class="table table-striped">
        <tr>
            <th>ID Balok</th>
            <th>Jumlah</th>
            <th>Barang Akhir</th>
            <th>Dimensi</th>
            <th>Status</th>
            <th colspan="2">Update Status</th>
        </tr>
        @foreach($datas as $cutting)
            <tr>
                <td>{{$cutting->ass_name}}</td>
                <td>{{$cutting->ass_unit}}</td>
                <td>{{$cutting->ass_number}}</td>
                <td>{{$cutting->ass_unit}}</td>
           
            </tr>
        @endforeach
    </table>
@endsection