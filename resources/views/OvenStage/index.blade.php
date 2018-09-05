@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Oven Stage</h1>

        <table class="table table-striped">
            <tr>
                <th>Process ID</th>
                <th>Item Name</th>
                <th>Amount</th>
                <th>End Item</th>
                <th>Status</th>
            </tr>
            @foreach($ovens as $oven)
                <tr>
                    <td><a href="ovens/{{$oven->reference_id}}">{{$cutting->reference_id}}</a></td>
                    <td>{{$oven->item_id}}</td>
                    <td>{{$oven->amount}}</td>
                    <td>{{$oven->item_id}}</td>
                    <td>{{$oven->oven_status->name}}</td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection