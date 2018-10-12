@extends('layouts.app')

@section('content')

<h2> Buat Perubahan Barang </h2>

<hr>

{!! Form::open(['action'=> 'AdjustmentinvController@store','method' => 'POST']) !!}

<div class="desc">
    <div class="form-group">
        {{Form::label('adj_reason','Alasan')}}
        {{Form::text('adj_reason','',['class' => 'form-control', 'placeholder' => 'Reason'])}}
    </div>

    <div class="form-group">
        {{Form::label('adj_date','Tanggal Perubahan')}}
        {{Form::date('adj_date','',['class' => 'form-control', 'placeholder' => 'Date'])}}
    </div>

      <div class="form-group" >
        {{Form::label('adj_items','Kode Barang')}}
           <select name="adj_items" class="form-control">
           @foreach($items as $item)
                        @if($item->item_measurement == null)
                            <option value="{{$item->id}}">{{ $item->item_name }}</option> 
                        @endif
             @endforeach  
            </select>               
    </div>  

     <div class="form-group">
        {{Form::label('adj_qty','Jumlah')}}
        {{Form::number('adj_qty','0',['class' => 'form-control', 'placeholder' => 'No Pintu'])}}
    </div>

    <hr style="color: #f00;background-color: black; height: 5px;">

    <center><h2> Barang Baru </h2></center>

     <div class="form-group" >
        {{Form::label('adj_cat','Kategori Barang')}}
           <select name="adj_cat" class="form-control">
           @foreach($cats as $cat)
                        @if($cat->cat_delete == null)
                            <option value="{{$cat->id}}">{{$cat->cat_name }} {{$cat->length}}x{{$cat->width}}</option> 
                        @endif
             @endforeach  
            </select>               
    </div>
    
    <div class="form-group">
        {{Form::label('adj_ass','Pintu Terbaru')}}
        {{Form::number('adj_ass','0',['class' => 'form-control', 'placeholder' => 'No Pintu'])}}
    </div>


      <div class="form-group">
        {{Form::label('adj_itemcode','Kode Barang Terbaru')}}
        {{Form::text('adj_itemcode','',['class' => 'form-control', 'placeholder' => 'Kode Nama Terbaru'])}}
    </div>

    <div class="form-group">
        {{Form::label('adj_length','Panjang Pintu')}}
        {{Form::number('adj_length','0',['class' => 'form-control', 'placeholder' => 'Ukuran Panjang'])}}
    </div>

    <div class="form-group">
        {{Form::label('adj_width','Lebar Pintu')}}
        {{Form::number('adj_width','0',['class' => 'form-control', 'placeholder' => 'quantity'])}}
    </div>

    <div class="form-group">
        {{Form::label('adj_height','Tinggi Pintu')}}
        {{Form::number('adj_height','0',['class' => 'form-control', 'placeholder' => 'quantity'])}}
    </div>

    <div class="form-group" rows="3">
        {{Form::label('description','Description')}}
        {{Form::textarea('adj_note','',['class' => 'form-control', 'placeholder' => 'description'])}}
    </div>

    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
</div>



@endsection