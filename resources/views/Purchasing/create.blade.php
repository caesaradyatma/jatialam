@extends('layouts.app')

@section('content')
<h1>Procurement Form</h1>

{!! Form::open(['action' => 'PurchasingsController@store','method' => 'POST']) !!}
    <div class="form-group">
      {{Form::label('item_name', 'Item Name')}}
      {{Form::text('item_name','',['class'=>'form-control','placeholder'=>'Item Name','required'])}}
    </div>
    <div class="form-group">
      {{Form::label('item_id', 'Item Name')}}
      {{Form::select('item_id',[1=>'Barang 1',2=>'Barang 2', 3=>'Barang 3'],'',['class'=>'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('item_name', 'Nama Barang')}}
            <select name="item_name" class="form-control">
                @foreach ($items as $item)
                    <option value="{{$item['Item']['id']}}">
                      {{$item->item_name}}
                    </option>
                @endforeach
            </select>
    </div>
    <div class="form-group">
      {{Form::label('expected_amount', 'Expected Amount')}}
      {{Form::number('expected_amount','',['class'=>'form-control','placeholder'=>'Expected Amount','required'])}}
    </div>
    <div class="form-group">
      {{Form::label('real_amount', 'Real Amount')}}
      {{Form::number('real_amount','',['class'=>'form-control','placeholder'=>'Real Amount','required'])}}
    </div>
    <div class="form-group">
      {{Form::label('sender_pic', 'Sender PIC')}}
      {{Form::text('sender_pic','',['class'=>'form-control','placeholder'=>'Sender PIC','required'])}}
    </div>
    <div class="form-group">
      {{Form::label('arrival_date', 'Arrival Date')}}
      {{Form::date('arrival_date','',['class'=>'form-control','placeholder'=>'Arrival Date','required'])}}
    </div>
    {{Form::hidden('_method','POST')}}
    {{Form::submit('Submit',['class'=>'btn btn-primary form-control'])}}
{!! Form::close() !!}
{{-- <button class="add_form_field">Add New Field &nbsp; <span style="font-size:16px; font-weight:bold;">+ </span></button> --}}
@endsection

@section('scripts')
    <script>
    // $(document).ready(function(){
    //   $("#btn1").click(function(){
    //       $("#wek").append("<input type='text' class='form-control' id='wex' placeholder='Products'>");
    //   });
    // });
    $(document).ready(function() {
        var max_fields      = 10;
        var wrapper         = $("#prod");
        var add_button      = $(".add_form_field");

        var x = 1;
        $(add_button).click(function(e){
            e.preventDefault();
            if(x < max_fields){
                x++;
                // $(wrapper).append('<div><input type="text" class="form-control" placeholder="Products" name="products[]"/><a href="#" class="delete">Delete</a></div>'); //add input box
                $(wrapper).append('<tr><td><input type="text" class="form-control" placeholder="Products" name="products[]"/></td><td><input type="number" name="quantity[]" class="form-control"></td><td><a href="#" class="delete">Delete</a></td><tr>'); //add input box
            }
            else
            {
                alert('You Reached the limits')
            }
        });

        $(wrapper).on("click",".delete", function(e){
            e.preventDefault(); $(this).parents('tr').remove(); x--;
        })
    });
  </script>
@endsection