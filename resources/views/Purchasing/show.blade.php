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
            <th>Item Name</th>
            <th>Expected Amount</th>
            <th>Real Amount</th>
        </tr>
        @foreach($purchasings as $purchasing)
            <tr>
                <td>{{$purchasing->item->item_name}}</td>
                <td>{{$purchasing->expected_amount}}</td>
                <td>{{$purchasing->real_amount}}</td>
            </tr>
        @endforeach
    </table>

    {{--  <a href="/purchasings/{{$reference_id}}/edit" class="btn btn-warning">Edit Data</a>  --}}

    {!!Form::open(['action'=>['PurchasingsController@destroy',$reference_id],'method'=>'POST','class'=>'pull-right','onsubmit'=>"return confirm('Apakah anda yakin akan menghapus data ini?');"])!!}
        {{Form::hidden('_method','DELETE')}}
        {{Form::submit('Hapus Data',['class'=>'btn btn-danger'])}}
    {!!Form::close()!!}
@endsection