@extends('layouts.app')

@section('content')
    
    {{--  Modal  --}}
    {{--  <div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">  --}}
    <div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">List Proses Pemotongan Yang sudah Selesai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <tr>
                        <th>Ref ID</th>
                        <th>ID Balok</th>
                        <th>Jumlah</th>
                        <th>Barang Akhir</th>
                        <th>Dimensi</th>
                        <th>Status</th>
                    </tr>
                    @foreach($cuttings as $cutting)
                        <tr>
                            <td>{{$cutting->reference_id}}</td>
                            <td>{{$cutting->cutting_item->code}}</td>
                            <td>{{$cutting->amount}}</td>
                            <td>{{$cutting->endproduct->cat_name}} {{$cutting->endproduct->cat_measurement}}</td>
                            <td>{{$cutting->dimension}}</td>
                            <td>{{$cutting->cutting_status->name}}</td>
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
    <h1>Buat Proses Oven Lanjutan dari Pemotongan</h1>
    {{--  Button trigger modal  --}}
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        Check List Pemotongan
    </button>
    <hr>
    {!! Form::open(['action' => 'OvenStageController@create','method' => 'POST']) !!}
        <table class="table table-striped">
            <tr>
                <th colspan="2">Reference ID</th>
            </tr>
            <tr>
                <td>
                    <select name="reference_id" class="form-control" id="reference_id">
                        <option value="0">
                            Buat Process Baru
                        </option>
                        @foreach ($cuttings as $cutting)
                            <option value="{{$cutting->reference_id}}">
                                {{$cutting->reference_id}}
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
    
@endsection