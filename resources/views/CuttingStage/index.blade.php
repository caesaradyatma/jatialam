@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <h1>Cutting Stage</h1>

        <table class="table table-striped">
            <tr>
                <th>Process ID</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Status</th>
                <th>Waktu Mulai</th>
                <th>Waktu Update Terakhir</th>
            </tr>
            @foreach($cuttings->unique('reference_id') as $cutting)
                <tr>
                    <td><a href="cuttings/{{$cutting->reference_id}}">{{$cutting->reference_id}}</a></td>
                    <td>{{$cutting->endproduct->cat_name}} {{$cutting->endproduct->cat_measurement}}</td>
                    <td>{{$cutting->amount}}</td>
                    <td>{{$cutting->cutting_status->name}}</td>
                    <td>
                        <?php
                            $userTimezone = new DateTimeZone('Asia/Jakarta');
                            $myTimezone = new DateTimeZone('Europe/London');
                            $myDateTime = new DateTime($cutting->created_at, $myTimezone);
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
                            $myDateTime = new DateTime($cutting->created_at, $myTimezone);
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
    {{ $cuttings->links() }}
@endsection