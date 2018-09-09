@extends ('layouts.app')

@section ('content')

@if(count($lists) > 0)
<table class="table table-hover">
    <tr class="success">
        <th>Nama Barang</th>
        <th>Tipe Barang</th>
        <th>Ukuran</th>
        <th>Status</th>
        <th>Details</th>
    </tr>

 @foreach($lists as $list)     
<tr>

    <td>{{$list->cat_name}}</td>
    <td>{{$list->cat_code}}</td>
    <td>{{$list->cat_measurement}}</td>
    <td>{{$list->cat_measurement}}</td>
    <td><a href="/inventory/{{$list->id}}" class="btn btn-default">Details</a></td>
</tr>

@endforeach



</table>
{{$lists->links()}}
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