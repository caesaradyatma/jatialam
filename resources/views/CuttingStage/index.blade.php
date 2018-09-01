@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Cutting Stage</h1>

        <table class="table table-striped">
            <tr>
                <th>Process ID</th>
                <th>Item Name</th>
                <th>Amount</th>
                <th>Status</th>
            </tr>
            @foreach($cuttings as $cutting)
                <tr>
                    <td><a href="cuttings/{{$cutting->reference_id}}">{{$cutting->reference_id}}</a></td>
                    <td>{{$cutting->cutting_item->item_name}}</td>
                    <td>{{$cutting->amount}}</td>
                    <td>{{$cutting->cutting_status->name}}</td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection