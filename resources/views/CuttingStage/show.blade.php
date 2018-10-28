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
                <th>Waktu Estimasi Selesai</th>
                <th>Waktu Update Terakhir</th>
                <th>Status</th>
                <th colspan="2">Update Status</th>
            </tr>
            @foreach($cuttings as $cutting)
                <tr>
                    <td>{{$cutting->endproduct->cat_name}} {{$cutting->endproduct->cat_measurement}}</td>
                    <td>{{$cutting->amount}}</td>
                    <td>{{$cutting->dimension}}</td>
                    <td>
                        <?php
                            /*$userTimezone = new DateTimeZone('Asia/Jakarta');
                            $myTimezone = new DateTimeZone('Europe/London');
                            $myDateTime = new DateTime($cutting->created_at, $myTimezone);
                            $offset = $userTimezone->getOffset($myDateTime);
                            $myInterval=DateInterval::createFromDateString((string)$offset . 'seconds');
                            $myDateTime->add($myInterval);
                            $result = $myDateTime->format('Y-m-d | H:i:s');
                            echo $result;*/
                        ?>
                        {{$cutting->created_at}}
                    </td>
                    <td>
                        {{$cutting->estimation_time}}
                    </td>
                    <td>
                        {{$cutting->updated_at}}
                    </td>
                    <td>{{$cutting->cutting_status->name}}</td>
                    <td>
                        {!! Form::open(['action' => ['CuttingStageController@update_status',$reference_id],'method' => 'POST']) !!}
                            @if($cutting->status !=3)
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
                            @if($cutting->status !=3)
                                {{Form::hidden('id',$cutting->id)}}
                                {{Form::submit('Update',['class'=>'btn btn-primary'])}}
                            @endif
                        {!!Form::close()!!}
                    </td>
                </tr>
            @endforeach
        </table>

        {{--  <a href="/purchasings/{{$reference_id}}/edit" class="btn btn-warning">Edit Data</a>  --}}

        {!!Form::open(['action'=>['CuttingStageController@destroy',$reference_id],'method'=>'POST','class'=>'pull-right','onsubmit'=>"return confirm('Apakah anda yakin akan menghapus data ini?');"])!!}
            {{Form::hidden('_method','DELETE')}}
            {{Form::submit('Hapus Data',['class'=>'btn btn-danger'])}}
        {!!Form::close()!!}
    </div>
@endsection
