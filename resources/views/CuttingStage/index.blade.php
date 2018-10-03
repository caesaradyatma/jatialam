@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Cutting Stage</h1>

        <table class="table table-striped">
            <tr>
                <th>Process ID</th>
                <th>ID Balok</th>
                <th>Barang Akhir</th>
                <th>Amount</th>
                <th>Status</th>
            </tr>
            @foreach($cuttings->unique('reference_id') as $cutting)
                <tr>
                    <td><a href="cuttings/{{$cutting->reference_id}}">{{$cutting->reference_id}}</a></td>
                    <td>{{$cutting->cutting_item->code}}</td>
                    <td>{{$cutting->endproduct->cat_name}} {{$cutting->endproduct->cat_measurement}}</td>
                    <td>{{$cutting->amount}}</td>
                    <td>{{$cutting->cutting_status->name}}</td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection