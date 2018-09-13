@extends('layouts.app')

@section('content')
<h1>Buat Proses Pemotongan</h1>

{!! Form::open(['action' => 'CuttingStageController@store','method' => 'POST']) !!}
    <table class="table table-striped" id="selectInput">        
        <tr>
            <th>ID Balok</th>
            <th>Jumlah</th>
            <th>Barang Jadi</th>
            <th>Dimensi</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <tr>
            <td>
                <select name="item_id[]" class="form-control">
                    @foreach ($baloks as $balok)
                        <option value="{{$balok->id}}">
                        {{$balok->code}}
                        </option>
                    @endforeach
                </select>
            </td>
            <td>
                <input type="number" name="amount[]" class="form-control" placeholder="Amount" required>
            </td>
            <td>
                <select name="endproduct_id[]" class="form-control">
                    {{--  @foreach ($items as $item)
                        <option value="{{$item->id}}">
                        {{$item->inventory->cat_name}} {{$item->inventory->cat_measurement}}
                        </option>
                    @endforeach  --}}
                    @foreach ($inventories as $inventory)
                        <option value="{{$inventory->id}}">
                        {{$inventory->cat_name}} {{$inventory->cat_measurement}}
                        </option>
                    @endforeach
                </select>
            </td>
            <td>
                {{--  <select name="dimension[]" class="form-control">
                    @foreach ($items as $item)
                        <option value="{{$item->id}}">
                        {{$item->item_measurement}}
                        </option>
                    @endforeach
                </select>  --}}
                <input type="text" name="dimension[]" class="form-control">
            </td>
            <td>
                <select name="status[]" class="form-control">
                    @foreach ($status as $value)
                        <option value="{{$value->id}}">
                        {{$value->name}}
                        </option>
                    @endforeach
                </select>
            </td>
            <td>
                
            </td>
        </tr>
        
    </table>

    {{Form::hidden('_method','POST')}}
    {{Form::submit('Submit',['class'=>'btn btn-primary form-control'])}}
    
{!! Form::close() !!}
    <button class="add_form_field">Add New Field &nbsp; <span style="font-size:16px; font-weight:bold;">+ </span></button>
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
        var wrapper         = $("#selectInput");
        var add_button      = $(".add_form_field");

        var x = 1;
        $(add_button).click(function(e){
            e.preventDefault();
            if(x < max_fields){
                x++;

                //$(wrapper).append('<tr><td><select name="item_id[]" class="form-control">@foreach($items as $item)<option value="{{$item->id}}">{{$item->item_name}}</option>@endforeach</select></td><td><input type="number" name="amount[]" class="form-control" placeholder="Amount" required></td><td><select name="endproduct_id[]" class="form-control">@foreach($items as $item)<option value="{{$item->id}}">{{$item->item_name}}</option>@endforeach</select></td><td><select name="dimension[]" class="form-control">@foreach($items as $item)<option value="{{$item->id}}">{{$item->item_measurement}}</option>@endforeach</select></td><td><select name="status[]" class="form-control">@foreach($status as $value)<option value="{{$value->id}}">{{$value->name}}</option>@endforeach</select></td><td><a href="#" class="delete btn btn-danger">Delete</a></td></tr>'); 
                $(wrapper).append('<tr><td><select name="item_id[]" class="form-control">@foreach($baloks as $balok)<option value="{{$balok->id}}">{{$balok->code}}</option>@endforeach</select></td><td><input type="number" name="amount[]" class="form-control" placeholder="Amount" required></td><td><select name="endproduct_id[]" class="form-control">@foreach($inventories as $inventory)<option value="{{$inventory->id}}">{{$inventory->cat_name}} {{$inventory->cat_measurement}}</option>@endforeach</select></td><td><input type="text" name="dimension[]" class="form-control"></td><td><select name="status[]" class="form-control">@foreach($status as $value)<option value="{{$value->id}}">{{$value->name}}</option>@endforeach</select></td><td><a href="#" class="delete btn btn-danger">Delete</a></td></tr>'); 
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