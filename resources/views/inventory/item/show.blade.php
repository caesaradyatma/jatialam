@extends ('layouts.app')

@section ('content')



@if(count($items) > 0)
<table class="table table-hover">
    <tr class="success">
        <th>Nama Barang</th>
        <th>Tipe Barang</th>
        <th>Ukuran</th>
        <th>Kode Pembentukan</th>
        <th>Details</th>
    </tr>

 @foreach($items as $list)     
<tr>

    <td>{{$list->item_name}}</td>
    <td>{{$list->item_qty}}</td>
    <td>{{$list->item_measurement}}</td>
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
        <th>Ukuran</th>
        <th>Status</th>
        <th>Details</th>
       
    </tr>
<tr>
    <td>No product </td>
</tr>
</table>

@endif


@endsection