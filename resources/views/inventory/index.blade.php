@extends ('layouts.app')

@section ('content')

<div class="container">
    <h2>Data Barang</h2>
    <hr>

    <form action="{{route('inventory.index')}}" method="GET">
        <div class="col-md-4 pull-right">
            <div class="form-group ">
                <input type="text" class="form-control" name="test" placeholder="Keyword" value="{{ isset($test) ? $test : ''}}">
            </div>
        </div>
            
            <div class="form-group pull-right">
                <button class="btn btn-success" type="submit">Search</button>
            </div>
</form>    
<a href = "/inventory/item/create" class="btn btn-primary" style="margin-top:10px;margin-bottom:15px;">Tambah Ukuran Barang</a> <br>

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
    <td><a href="/inventory/{{$list->id}}/item" class="btn btn-default">Details</a></td>
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

</div>
@endsection