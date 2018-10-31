@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <h1>Finalisasi</h1>

        <table class="table table-striped">
            <tr>
                <th>Process ID</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Waktu Mulai</th>
                <th>Estimasi Waktu Selesai</th>
                <th>Waktu Update Terakhir</th>
                <th>Status</th>
            </tr>
            @foreach($finals as $final)
                <tr>
                    <td><a href="finals/{{$final->reference_id}}">{{$final->reference_id}}</a></td>
                    <td>{{$final->final_endproduct->cat_name}} {{$final->final_endproduct->cat_measurement}}</td>
                    <td>{{$final->amount}}</td>
                    <td>
                        <?php
                            /*$userTimezone = new DateTimeZone('Asia/Jakarta');
                            $myTimezone = new DateTimeZone('Europe/London');
                            $myDateTime = new DateTime($final->created_at, $myTimezone);
                            $offset = $userTimezone->getOffset($myDateTime);
                            $myInterval=DateInterval::createFromDateString((string)$offset . 'seconds');
                            $myDateTime->add($myInterval);
                            $result = $myDateTime->format('Y-m-d | H:i:s');
                            echo $result;*/
                        ?>
                        {{$final->created_at}}
                    </td>
                    <td>
                        {{$final->estimation_time}}
                    </td>
                    <td>
                        {{$final->updated_at}}
                    </td>
                    <td>{{$final->final_status->name}}</td>
                </tr>
            @endforeach
        </table>
    </div>
    {{ $finals->links() }}
@endsection