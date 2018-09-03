@extends('layouts.app')

@section('content')

@if(count($lists) != 0)
<table class="table table-hover">
    <tr class="success">
        <th>Nama Barang</th>
        <th>Tipe Barang</th>
        <th>Ukuran</th>
        <th>Status</th>
        <th>Details</th>
    </tr>

@foreach ($lists as $list)     
<tr>

    <td>{{$list->item_name}}</td>
    <td>{{$list->item_measurement}}</td>
    <td>{{$list->item_qty}}</td>
    <td>{{$list->item_assembly}}</td>
    <td>{{$list->item_description}}</td>
   
</tr>
@endforeach
</table>

@else
<table class="table table-hover">
    <tr class="success">
        <th>Nama Barang</th>
        <th>Tipe Barang</th>
        <th>Kode Barang</th>
        <th>Stok Barang</th>
        <th>Reorder Level</th>
       
    </tr>
<tr>
    <td>No product </td>
</tr>
</table>

@endif

@endsection