@extends('layouts.app')

@section('content')

<h2> Buat Perubahan Barang </h2>

<hr>

{!! Form::open(['method' => 'POST']) !!}

<div class="desc">
    <div class="form-group">
        {{Form::label('adjst_reason','Reason')}}
        {{Form::text('adjst_reason','',['class' => 'form-control', 'placeholder' => 'Reason'])}}
    </div>

    <div class="form-group">
        {{Form::label('adjst_date','Date')}}
        {{Form::date('adjst_date','',['class' => 'form-control', 'placeholder' => 'Date'])}}
    </div>
        
    <div class="form-group" >
        {{Form::label('item_name','Select Item')}}
           <select name="item_id" class="form-control selectpicker" data-live-search="true">
            sdsd
            </select> 

                    
    </div> 
    
    <div class="form-group">
        {{Form::label('item_quantity','Quantity Adjusted')}}
        {{Form::number('item_qty','0',['class' => 'form-control', 'placeholder' => 'quantity'])}}
    </div>

    <div class="form-group" rows="3">
        {{Form::label('description','Description')}}
        {{Form::textarea('','',['class' => 'form-control', 'placeholder' => 'description'])}}
    </div>

    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
</div>



@endsection