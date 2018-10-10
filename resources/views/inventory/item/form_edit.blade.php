{!! Form::model(['id' => 'modal-form','method' => 'POST', array ('action' => array ( 'ItemController@update',$list->id)), 'class' =>'form-inline form-delete']) !!}
{{method_field('patch')}}
{{csrf_field()}}

<input type="hidden" name="item_id" id="itemid" value="">


<div class="form-group">
        <label for="item_name">Nama Barang </label>
        <input type="text" class="form-control" name="item_name" id="item_name">
</div>

<div class="form-group">
        <label for="item_type">Panjang </label>
        <input type="text" class="form-control" name="item_length" id="item_length">
</div>

<div class="form-group">
        <label for="item_type">Lebar </label>
        <input type="text" class="form-control" name="item_width" id="item_width">
</div>

<div class="form-group">
        <label for="item_type">Tinggi </label>
        <input type="text" class="form-control" name="item_height" id="item_height">
</div>

<div class="form-group">
        <label for="item_name">No Pembentukan </label>
        <input type="text" class="form-control" name="item_assembly" id="item_assembly">
</div>

<div class="form-group">
        <label for="item_name">Jumlah </label>
        <input type="number" class="form-control" name="item_qty" id="item_qty">
</div>

{!! Form::close() !!}