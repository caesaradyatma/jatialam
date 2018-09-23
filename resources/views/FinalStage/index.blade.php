@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Finalisasi</h1>

        <table class="table table-striped">
            <tr>
                <th>Reference ID</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Status</th>
            </tr>
            @foreach($finals as $final)
                <tr>
                    <td><a href="finals/{{$final->reference_id}}">{{$final->reference_id}}</a></td>
                    <td>{{$final->final_endproduct->cat_name}} {{$final->final_endproduct->cat_measurement}}</td>
                    <td>{{$final->amount}}</td>
                    <td>{{$final->final_status->name}}</td>
                    {{--  <td>{{$final->final_status->name}}</td>  --}}
                </tr>
            @endforeach
        </table>
    </div>

@endsection