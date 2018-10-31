@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        {{--  Button trigger modal  --}}
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
            Check List Oven
        </button>
        
        {{--  Modal  --}}
        {{--  <div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">  --}}
        <div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">List Proses Oven Yang sudah Selesai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <tr>
                            <th>Ref ID</th>
                            <th>Nama barang</th>
                            <th>Jumlah</th>
                            <th>Dimensi</th>
                            <th>Status</th>
                        </tr>
                        @foreach($ovens as $oven)
                            <tr>
                                <td>{{$oven->reference_id}}</td>
                                <td>{{$oven->oven_endproduct->cat_name}} {{$oven->oven_endproduct->cat_measurement}}</td>
                                <td>{{$oven->amount}}</td>
                                <td>{{$oven->dimension}}</td>
                                <td>{{$oven->oven_status->name}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="modal-footer">
                    
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    {{--  {{ $cuttings->links() }}  --}}
                    {{--  <button type="button" class="btn btn-primary">Save changes</button>  --}}
                </div>
                </div>
            </div>
        </div>
        <h1>Check Proses</h1>
        {!! Form::open(['action' => 'FinalStageController@create','method' => 'POST']) !!}
            <table class="table table-striped">
                <tr>
                    <th colspan="2">Process ID</th>
                </tr>
                <tr>
                    <td>
                        <select name="reference_id" class="form-control" id="reference_id">
                            @foreach ($oven_refs as $oven)
                                <option value="{{$oven->reference_id}}">
                                    {{$oven->reference_id}}
                                </option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        {{Form::hidden('_method','POST')}}
                        {{Form::submit('Submit',['class'=>'btn btn-primary form-control'])}}
                    </td>
                </tr>
            </table>
        {!! Form::close() !!}
    </div>
@endsection