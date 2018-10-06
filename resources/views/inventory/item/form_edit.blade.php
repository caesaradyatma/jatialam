{!! Form::model($list, ['id' => 'modal-form','method' => 'post', 'route' => ['items.update', $list->id], 'class' =>'form-inline form-delete']) !!}
{{method_field('patch')}}
{{csrf_field()}}

<input type="hidden" name="item_id" id="itemid" value="">


<div class="form-group">
        <label for="item_name">Nama Barang </label>
        <input type="text" class="form-control" name="item_name" id="item_name">
</div>

<div class="form-group">
        <label for="item_type">Tipe Barang </label>
        <input type="text" class="form-control" name="item_length" id="item_type">
</div>

<div class="form-group">
        <label for="item_name">SKU </label>
        <input type="text" class="form-control" name="item_assembly" id="sku_code">
</div>

<div class="form-group">
        <label for="item_name">Ukuran </label>
        <input type="text" class="form-control" name="item_qty" id="item_measurement">
</div>




{!! Form::close() !!}
