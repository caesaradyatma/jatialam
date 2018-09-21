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
<a href = "/inventory/item/create" class="btn btn-primary" style="margin-top:10px;margin-bottom:15px;">Bikin Balok Kayu</a> <br>


<table class="table table-hover">
    <tr class="success">
        <th>Balok Kode</th>
        <th>Dimensi</th>
        <th>Details</th>
    </tr>

   
<tr>

    <td>test</td>
    <td>test</td>
    <td><a href="as" class="btn btn-default">Details</a></td>
</tr>




</table>



</div>
@endsection