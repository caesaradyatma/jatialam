@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1>Detail Data Finalisasi</h1>
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
                <th>Status</th>
                <th colspan="2">Update Status</th>
                <th>Waktu Mulai</th>
                <th>Waktu Update Terakhir</th>
            </tr>
            @foreach($finals as $final)
                    <tr>
                        <td>{{$final->final_endproduct->cat_name}} {{$final->final_endproduct->cat_measurement}}</td>
                        <td>{{$final->amount}}</td>
                        <td>{{$final->dimension}}</td>
                        <td>{{$final->final_status->name}}</td>
                        <td>
                            {!! Form::open(['action' => ['FinalStageController@update_status',$reference_id],'method' => 'POST']) !!}
                                @if($final->status != 9)
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
                                @if($final->status != 9)
                                    {{Form::hidden('id',$final->id)}}
                                    {{Form::submit('Update',['class'=>'btn btn-primary'])}}
                                @endif
                            {!!Form::close()!!}
                        </td>
                        <td>
                            <?php
                                $userTimezone = new DateTimeZone('Asia/Jakarta');
                                $myTimezone = new DateTimeZone('Europe/London');
                                $myDateTime = new DateTime($final->created_at, $myTimezone);
                                $offset = $userTimezone->getOffset($myDateTime);
                                $myInterval=DateInterval::createFromDateString((string)$offset . 'seconds');
                                $myDateTime->add($myInterval);
                                $result = $myDateTime->format('Y-m-d | H:i:s');
                                echo $result;
                            ?>
                        </td>
                        <td>
                            <?php
                                $userTimezone = new DateTimeZone('Asia/Jakarta');
                                $myTimezone = new DateTimeZone('Europe/London');
                                $myDateTime = new DateTime($final->updated_at, $myTimezone);
                                $offset = $userTimezone->getOffset($myDateTime);
                                $myInterval=DateInterval::createFromDateString((string)$offset . 'seconds');
                                $myDateTime->add($myInterval);
                                $result = $myDateTime->format('Y-m-d | H:i:s');
                                echo $result;
                            ?>
                        </td>
                    </tr>
                @endforeach
        </table>

        {{--  <a href="/purchasings/{{$reference_id}}/edit" class="btn btn-warning">Edit Data</a>  --}}

        {!!Form::open(['action'=>['FinalStageController@destroy',$reference_id],'method'=>'POST','class'=>'pull-right','onsubmit'=>"return confirm('Apakah anda yakin akan menghapus data ini?');"])!!}
            {{Form::hidden('_method','DELETE')}}
            {{Form::submit('Hapus Data',['class'=>'btn btn-danger'])}}
        {!!Form::close()!!}
    </div>
@endsection
