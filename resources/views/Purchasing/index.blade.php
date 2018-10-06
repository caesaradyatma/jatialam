@extends('layouts.app')

@section('content')

<h1>Procurement</h1>
<table class="table table-striped">
    <tr>
        <th>Reference ID</th>
        <th>Sender PIC</th>
        <th>Arrival Date</th>
    @foreach($purchasings->unique('reference_id') as $purchasing)
        <tr>
            <td><a href="purchasings/{{$purchasing->reference_id}}">{{$purchasing->reference_id}}</a></td>
            <td>{{$purchasing->sender_pic}}</td>
            <td>{{$purchasing->arrival_date}}</td>
        </tr>
    @endforeach
</table>
{{ $purchasings->links() }}
@endsection