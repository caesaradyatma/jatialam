@extends('layouts.app')

@section('content')
<h1>Penyusunan Tiket</h1>
    <table class="table">
        <tr>
            <th>Ref ID</th>
            <td>{{$ass_number}}</td>
        </tr>

         <tr>
            <th>Pembentukan</th>
            @foreach($datas->unique('ass_name') as $cut)
            <td>{{$cut->ass_name}}</td>
            @endforeach
        </tr>
    </table>

    <table class="table table-striped">
        <tr>
            <th>Barang</th>
            <th>Jumlah</th>
            <th>Barang Akhir</th>
            <th>Unit Kerja</th>
        </tr>
        @foreach($datas as $cutting)
            <tr>
                <td>{{$cutting->item_id}}</td>
                <td>{{$cutting->ass_unit}}</td>
                <td>{{$cutting->ass_number}}</td>
                <td>{{$cutting->ass_assignment}}</td>
            
      
            </tr>
            @endforeach
    </table>
@endsection