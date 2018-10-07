@extends('layouts.app')

@section('content')
    <h1>Detail Data Pemotongan</h1>
    <table class="table">
        <tr>
            <th>Ref ID</th>
            <td>{{$reference_id}}</td>
        </tr>
    </table>

    <table class="table table-striped">
        <tr>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Dimensi</th>
            <th>Status</th>
            <th colspan="2">Update Status</th>
        </tr>
        @foreach($ovens as $oven)
                <tr>
                    <td>{{$oven->oven_endproduct->cat_name}} {{$oven->oven_endproduct->cat_measurement}}</td>
                    <td>{{$oven->amount}}</td>
                    <td>{{$oven->dimension}}</td>
                    <td>{{$oven->oven_status->name}}</td>
                    <td>
                        {!! Form::open(['action' => ['OvenStageController@update_status',$reference_id],'method' => 'POST']) !!}
                            <select name="status" class="form-control">
                                @foreach ($status as $value)
                                    <option value="{{$value->id}}">
                                    {{$value->name}}
                                    </option>
                                @endforeach
                            </select>
                    </td>
                    <td>
                            {{Form::hidden('id',$oven->id)}}
                            {{Form::submit('Update',['class'=>'btn btn-primary'])}}
                        {!!Form::close()!!}
                    </td>
                    {{--  <td>{{$oven->oven_status->name}}</td>  --}}
                </tr>
            @endforeach
        {{--  @foreach($ovens as $oven)
            <tr>
                <td>{{$oven->oven_endproduct->cat_name}} {{$oven->cat_measurement}}</td>
                <td>{{$oven->amount}}</td>
                <td>{{$oven->oven_endproduct->cat_name}} {{$oven->endproduct->cat_measurement}}</td>
                <td></td>
                <td>{{$oven->oven_status->name}}</td>
                <td>
                    {!! Form::open(['action' => ['OvenStageController@update_status',$reference_id],'method' => 'POST']) !!}
                        <select name="status" class="form-control">
                            @foreach ($status as $value)
                                <option value="{{$value->id}}">
                                {{$value->name}}
                                </option>
                            @endforeach
                        </select>
                </td>
                <td>
                        {{Form::hidden('id',$oven->id)}}
                        {{Form::submit('Update',['class'=>'btn btn-primary'])}}
                    {!!Form::close()!!}
                </td>
            </tr>
        @endforeach  --}}
    </table>

    {{--  <a href="/purchasings/{{$reference_id}}/edit" class="btn btn-warning">Edit Data</a>  --}}

    {!!Form::open(['action'=>['OvenStageController@destroy',$reference_id],'method'=>'POST','class'=>'pull-right','onsubmit'=>"return confirm('Apakah anda yakin akan menghapus data ini?');"])!!}
        {{Form::hidden('_method','DELETE')}}
        {{Form::submit('Hapus Data',['class'=>'btn btn-danger'])}}
    {!!Form::close()!!}
@endsection
