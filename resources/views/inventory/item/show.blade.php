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
<!--    <button class="btn btn-default" data-mytitle="{{$list->item_name}}" data-itemlength="{{$list->item_length}}" 
      data-itemwidth="{{$list->item_width}}" data-itemheight="{{$list->item_height}}"
                    data-sku="{{$list->item_assembly}}" 
                    data-measurement="{{$list->item_qty}}" 
                    data-itemId="{{$list->id}}" 
                    data-toggle="modal" data-target="#edit">Edit
                </button> -->
      </div>
    <div class="col-sm-2">
  
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

 <!--  Modal EDIT -->

    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                    <div class="modal-body"> 
                    @include('inventory.item.form_edit')
                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="button" id="modal-form-submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                
                </div>
            </div>
         </div>


@endsection