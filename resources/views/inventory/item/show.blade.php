@extends ('layouts.app')

@section ('content')

    

</table>


@if(count($items) > 0)
<div class="container-fluid">
    <div class="row bg-success">
      <div class="col-sm-2">
        <h3>Nama Barang</u></h3>
      </div>
      <div class="col-sm-2">
        <h3>Ukuran</h3>
      </div>
      <div class="col-sm-2">
        <h3>Kode Pintu</h3>
      </div>
      <div class="col-sm-2 other">
        <h3>Total Dibutuhkan</h3>
      </div>
      <div class="col-sm-2 other">
        <h3>Barang Jadi</h3>
      </div>
      <div class="col-sm-2 other">
        <h3>Keterangan</h3>
      </div>
    </div>
  </div>


@foreach($items as $list)     

<div class="container-fluid">
    <div class="row">
      <div class="col-sm-2">
        <h3>{{$list->item_name}}</h3>
      </div>
      <div class="col-sm-2">
        <h3>{{$list->item_length}} x {{$list->item_width}} x {{$list->item_height}}</h3>
      </div>
      <div class="col-sm-2">
        <h3>{{$list->item_assembly}}</h3>
      </div>
      <div class="col-sm-2 other">
        <h3>{{$list->item_qty}}</h3>
      </div>
      <div class="col-sm-2 other">
        <h3>0</h3>
      </div>
      <div class="col-sm-2 other">

      {{$list->item_description}}
     <!--   <h3> <button class="btn btn-default" data-mytitle="{{$list->item_name}}" data-itemtype="{{$list->item_length}}" data-sku="{{$list->item_assembly}}" 
                    data-measurement="{{$list->item_qty}}" data-itemId="{{$list->id}}" data-toggle="modal" data-target="#edit">Edit
                </button></h3> -->
      </div>
    </div>
  </div>

  <hr>

@endforeach


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