@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <h1>Oven Stage</h1>

        <table class="table table-striped">
            <tr>
                <th>Process ID</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Status</th>
                <th>Waktu Mulai</th>
                <th>Waktu Update Terakhir</th>
            </tr>
            @foreach($ovens as $oven)
                <tr>
                    <td><a href="ovens/{{$oven->reference_id}}">{{$oven->reference_id}}</a></td>
                    <td>{{$oven->oven_endproduct->cat_name}} {{$oven->oven_endproduct->cat_measurement}}</td>
                    <td>{{$oven->amount}}</td>
                    <td>{{$oven->oven_status->name}}</td>
                    <td>
                        <?php
                            $userTimezone = new DateTimeZone('Asia/Jakarta');
                            $myTimezone = new DateTimeZone('Europe/London');
                            $myDateTime = new DateTime($oven->created_at, $myTimezone);
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
                            $myDateTime = new DateTime($oven->updated_at, $myTimezone);
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
    </div>
    {{ $ovens->links() }}
@endsection