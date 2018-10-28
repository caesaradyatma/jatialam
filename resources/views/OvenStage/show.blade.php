@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1>Detail Data Pemotongan</h1>
        <table class="table">
            <tr>
                <th>Process ID</th>
                <td>{{$reference_id}}</td>
            </tr>
        </table>

        <table class="table table-striped">
            <tr>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Dimensi</th>
                <th>Waktu Mulai</th>
                <th>Estimasi Waktu Selesai</th>
                <th>Waktu Update Terakhir</th>
                <th>Status</th>
                <th colspan="2">Update Status</th>
            </tr>
            @foreach($ovens as $oven)
                    <tr>
                        <td>{{$oven->oven_endproduct->cat_name}} {{$oven->oven_endproduct->cat_measurement}}</td>
                        <td>{{$oven->amount}}</td>
                        <td>{{$oven->dimension}}</td>
                        <td>
                            <?php
                                /*$userTimezone = new DateTimeZone('Asia/Jakarta');
                                $myTimezone = new DateTimeZone('Europe/London');
                                $myDateTime = new DateTime($oven->created_at, $myTimezone);
                                $offset = $userTimezone->getOffset($myDateTime);
                                $myInterval=DateInterval::createFromDateString((string)$offset . 'seconds');
                                $myDateTime->add($myInterval);
                                $result = $myDateTime->format('Y-m-d | H:i:s');
                                echo $result;*/
                            ?>
                            {{$oven->created_at}}
                        </td>
                        <td>
                            {{$oven->estimation_time}}
                        </td>
                        <td>
                            {{$oven->updated_at}}
                        </td>
                        <td>{{$oven->oven_status->name}}</td>
                        <td>
                            {!! Form::open(['action' => ['OvenStageController@update_status',$reference_id],'method' => 'POST']) !!}
                                @if($oven->status != 6)
                                    <select name="status" class="form-control">
                                        @foreach ($status as $value)
                                            <option value="{{$value->id}}">
                                            {{$value->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                @endif
                        </td>
                        <td>
                                @if($oven->status != 6)
                                    {{Form::hidden('id',$oven->id)}}
                                    {{Form::submit('Update',['class'=>'btn btn-primary'])}}
                                @endif
                            {!!Form::close()!!}
                        </td>
                    </tr>
                @endforeach
        </table>

        {{--  <a href="/purchasings/{{$reference_id}}/edit" class="btn btn-warning">Edit Data</a>  --}}

        {!!Form::open(['action'=>['OvenStageController@destroy',$reference_id],'method'=>'POST','class'=>'pull-right','onsubmit'=>"return confirm('Apakah anda yakin akan menghapus data ini?');"])!!}
            {{Form::hidden('_method','DELETE')}}
            {{Form::submit('Hapus Data',['class'=>'btn btn-danger'])}}
        {!!Form::close()!!}
    </div>
@endsection
