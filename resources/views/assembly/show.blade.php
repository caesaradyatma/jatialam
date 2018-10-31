@extends('layouts.app')

@section('content')
<h1>Penyusunan Tiket</h1>
<hr>
<a href ="/pdf/{{$test->ass_number}}" class="btn btn-info" style="float:right; margin-bottom: 10px;">Download Data</a>

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
        <tr>
            <th>Tanggal Pembuatan </th>
            <td> {{$date_c}}</td>
        </tr>
        <tr>
            <th>Tanggal Penyelesaian </th>
            <td> {{$date_f}}</td>
        </tr>
        <tr>
            <th>Catatan</th>
            <td> {{$desc}}</td>
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
                <td>{{$cutting->item_inih->item_name}} ( {{$cutting->item_inih->item_length}}x{{$cutting->item_inih->item_width}}x{{$cutting->item_inih->item_height}} )</td>
                <td>{{$cutting->ass_unit}}</td>
                <td>{{$cutting->ass_number}}</td>
                <td>{{$cutting->ass_assignment}}</td>
            
      
            </tr>
            @endforeach
    </table>
    {{ Form::open(['method' => 'DELETE', 'route' => ['ass.delete', $test->ass_number]]) }}
             
                {!! csrf_field() !!}  

                     {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                {{ Form::close() }}
@endsection