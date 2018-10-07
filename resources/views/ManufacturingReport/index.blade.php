@extends('layouts.app')

@section('content')

    <h1>Laporan Produksi</h1>
    <hr>
    {{-- <small>Pilih ID proses</small>
    {!! Form::open(['action' => 'ManufacturingReportController@create','method' => 'POST']) !!}
        <table class="table table-striped">
            <tr>
                <th colspan="2">Reference ID</th>
            </tr>
            <tr>
                <td>
                    <select name="reference_id" class="form-control" id="reference_id">
                        @foreach ($ids as $id)
                            <option value="{{$id->reference_id}}">
                                {{$id->reference_id}}
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
    {!! Form::close() !!} --}}

    <table class="table table-striped">
        <tr>
            <th>Reference ID</th>
            <th>Nama Proses</th>
            <th>Status</th>
            <th>Diperbarui Pada</th>
        </tr>
        @foreach($reports as $report)
            <tr>
                <td>{{$report->reference_id}}</td>
                <td>{{$report->report_status->category}}</td>
                <td>{{$report->report_status->name}}</td>
                <td>{{$report->updated_at}}</td>
            </tr>
        @endforeach
    </table>
@endsection
