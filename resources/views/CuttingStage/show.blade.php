@extends('layouts.app')

@section('content')
    <h1>Cutting Stage Details</h1>
    <table class="table">
        <tr>
            <th>Reference ID</th>
            <td>{{$reference_id}}</td>
        </tr>
    </table>

    <table class="table table-striped">
        <tr>
            <th>Item Name</th>
            <th>Amount</th>
            <th>Status</th>
        </tr>
        @foreach($cuttings as $cutting)
            <tr>
                <td>{{$cutting->cutting_item->item_name}}</td>
                <td>{{$cutting->amount}}</td>
                <td>{{$cutting->cutting_status->name}}</td>
            </tr>
        @endforeach
    </table>

    {{--  <a href="/purchasings/{{$reference_id}}/edit" class="btn btn-warning">Edit Data</a>  --}}

    {!!Form::open(['action'=>['CuttingStageController@destroy',$reference_id],'method'=>'POST','class'=>'pull-right','onsubmit'=>"return confirm('Apakah anda yakin akan menghapus data ini?');"])!!}
        {{Form::hidden('_method','DELETE')}}
        {{Form::submit('Hapus Data',['class'=>'btn btn-danger'])}}
    {!!Form::close()!!}
@endsection