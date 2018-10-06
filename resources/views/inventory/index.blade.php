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

<form method="POST" action="{{ url('/delete') }}"> 
    {{csrf_field()}}

@if(count($lists) > 0)
<table class="table table-hover">
    <tr class="success">
        <th>Kategori Barang</th>
        <th>Kode</th>
        <th>Ukuran</th>
        <th>Note</th>
        <th>Details</th>
        <th><input type="submit" class="btn btn-danger" value="Delete Marked"></th>
        

    </tr>

 @foreach($lists as $list)  

<tr>

    <td>{{$list->cat_name}}</td>
    <td>{{$list->cat_code}}</td>
    <td>{{$list->length}} x {{$list->width}}</td>
    <td>{{$list->keterangan}}</td>
   
   
    <td><a href="/inventory/{{$list->id}}" class="btn btn-default">Details</a></td>

    <td> 
           <label><input type="checkbox" class="checkthis" value="{{$list->id}}" name="delete[]"></label><br />

          </td>
    

</tr>

</form>

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

</form>   

<!-- Modal Delete -->

<div class="modal fade" id="delete" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Konfirmasi Barang</h4>
                        </div>
                        <div class="modal-body text-center">
                            <h3>Anda Yakin Untuk Menghapus Barang?</h3>
                        </div>
                        <div class="modal-footer">
                            @include('inventory.inventory_modaldelete')
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
        </div>

</div>
@endsection