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
        <h3>Aksi</h3>
        <div class="row">
            <div class="col-sm-4 other">
              <h4>Pending</h4>
            </div>
            <div class="col-sm-4 other2">
              <h4>On Process</h4>
            </div>
            <div class="col-sm-4 other2">
                <h4>Ready</h4>
              </div>
          </div>
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
        <h3>{{$list->item_measurement}}</h3>
      </div>
      <div class="col-sm-2">
        <h3>{{$list->item_assembly}}</h3>
      </div>
      <div class="col-sm-2 other">
        <h3>{{$list->item_qty}}</h3>
      </div>
      <div class="col-sm-2 other">
        <div class="row">
            <div class="col-sm-4 other">
              <h4>1</h4>
            </div>
            <div class="col-sm-4 other2">
              <h4>2</h4>
            </div>
            <div class="col-sm-4 other2">
                <h4>3</h4>
              </div>
          </div>
      </div>
      <div class="col-sm-2 other">
        <h3>Keterangan</h3>
      </div>
    </div>
  </div>

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