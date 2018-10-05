@extends('layouts.app')

@section('content')
    <h1>Procurement Details</h1>
    <table class="table">
        <tr>
            <th>Reference ID</th>
            <td>{{$reference_id}}</td>
        </tr>
        <tr>
            <th>Arrival Date</th>
            <td>{{$arrival_date}}</td>
        </tr>
        <tr>
            <th>Sender PIC</th>
            <td>{{$sender_pic}}</td>
    </table>

    <table class="table table-striped">
        <tr>
            <th>Nama Barang</th>
            <th>Dimensi</th>
            <th>Jumlah Barang</th>
            <th>Barang Buruk</th>
        </tr>
        @foreach($purchasings as $purchasing)
            <tr>
                <td>{{$purchasing->purchasing_endproduct->cat_name}} {{$purchasing->purchasing_endproduct->cat_measurement}}</td>
                <td>{{$purchasing->dimension}}</td>
                <td>{{$purchasing->amount}}</td>
                <td>{{$purchasing->rejected_amount}}</td>
            </tr>
        @endforeach
    </table>

    {{--  <a href="/purchasings/{{$reference_id}}/edit" class="btn btn-warning">Edit Data</a>  --}}

    {!!Form::open(['action'=>['PurchasingsController@destroy',$reference_id],'method'=>'POST','class'=>'pull-right','onsubmit'=>"return confirm('Apakah anda yakin akan menghapus data ini?');"])!!}
        {{Form::hidden('_method','DELETE')}}
        {{Form::submit('Hapus Data',['class'=>'btn btn-danger'])}}
    {!!Form::close()!!}
@endsection