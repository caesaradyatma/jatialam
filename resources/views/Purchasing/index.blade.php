@extends('layouts.app')

@section('content')

<h1>Procurement</h1>
<table class="table table-striped">
    <tr>
        <th>Reference ID</th>
        <th>Item Names</th>
        <th>Expected Amount</th>
        <th>Real Amount</th>
        <th>Sender PIC</th>
        <th>Arrival Date</th>
    @foreach($purchasings as $purchasing)
        <tr>
            <td>{{$purchasing->reference_id}}</td>
            <td>{{$purchasing->item_name}}</td>
            <td>{{$purchasing->expected_amount}}</td>
            <td>{{$purchasing->real_amount}}</td>
            <td>{{$purchasing->sender_pic}}</td>
            <td>{{$purchasing->arrival_date}}</td>
        </tr>
    @endforeach
</table>
{{ $purchasings->links() }}
@endsection