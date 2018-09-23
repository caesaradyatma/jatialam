@extends ('layouts.app')

@section ('content')
<div class="container">
    <h2>Data Balok Kayu</h2>
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
<a href = "/balok/create" class="btn btn-primary" style="margin-top:10px;margin-bottom:15px;">Bikin Balok Kayu</a> <br>

@if(count($lists) > 0)
<table class="table table-hover">
    <tr class="success">
        <th>Balok Kode</th>
        <th>Total</th>
        <th>Ukuran</th>
        <th>Details</th>
    </tr>

 @foreach($lists as $list) 
<tr>

    <td>{{$list->code}}</td>
    <td>{{$list->quantity}}</td>
    <td>{{$list->balok_measure}}</td>
    
    <td><a href="as" class="btn btn-default">Details</a></td>
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

</div>
@endsection
