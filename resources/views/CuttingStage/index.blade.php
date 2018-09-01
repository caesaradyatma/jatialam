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
                    <td>$cutting->id</td>
                    <td>$cutting->item_id</td>
                    <td>$cutting->amount</td>
                    <td>$cutting->status</td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection