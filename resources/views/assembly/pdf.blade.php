<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <title>owner</owner>

    <style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>
<body>
<div class="container">
<img src="{{ asset('storage/img/P1.jpg') }}">
<hr style=" border-style: inset;
    border-width: 5px;">
  <h2>Tiket Pembentukan</h2>
  <div class="panel panel-default">
    <div class="panel-heading"><b>Kode Pembentukan :</b><h3> {{$as_num}} </h3> </div>
    <div class="panel-body">
    <div class="row">
        <div class="col-sm-2">
        Nama Pembentukan :<h4> {{$as_name}} </h4> 
        </div>
        <div class="col-sm-2">
        Status Proses :<h4> {{$as_stat}} </h4> 
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
        Tanggal Pembentukan :<h4> {{$as_creation}} </h4> 
        </div>
        <div class="col-md-4">
        Tanggal Selesai :<h4> {{$as_final}} </h4> 
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-4">
        Keterangan:<h4> {{$as_desc}} </h4> 
        </div>
    </div>
    </div>
  </div>
</div>  
<table>
    <tr>
        <th>Nama Barang</th>
        <th>Jumlah</th>
        <th>Kategori</th>
        <th>Pekerjaan</th>
    </tr>
    
    @foreach($tai as $assembly)

<tr>
    <td>{{$assembly->item_inih->item_name}}</td>
    <td>{{$assembly->ass_unit}}</td>
    <td>{{$assembly->cat_ah->cat_name}}</td>
    <td>{{$assembly->ass_assignment}}</td>
    
    
</tr>

@endforeach
</table>

 
</body>
</html>


