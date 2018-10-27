@extends('layouts.app')

@section('content')

    <h1>Buat Proses Oven Baru</h1>
    <hr>
    {{--  Add Item Button  --}}
    {{--  <button class="add_form_field btn btn-primary">Add New Field &nbsp; <span style="font-size:16px; font-weight:bold;">+ </span></button>  --}}

    {!! Form::open(['action' => 'OvenStageController@store','method' => 'POST']) !!}
        <table class="table table-striped" id="selectInput">
            <tr>
                <th>Reference ID</th>
                <th>Nama Barang</th>
                <th>Dimensi</th>
                <th>Jumlah</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            {{--  <tr>
                <td>
                    {{$reference_id}}
                </td>
                <td>
                    <select name="id[]" class="form-control">
                        @foreach ($cuttings as $cutting)
                            <option value="{{$cutting->id}}">
                            {{$cutting->endproduct->cat_name}} {{$cutting->endproduct->cat_measurement}}
                            </option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="string" name="dimension[]" class="form-control" value={{$cutting->dimension}}>
                </td>
                <td>
                    <input type="number" name="amount[]" class="form-control" placeholder="Amount" required>
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
            </tr>  --}}
            @if($reference_id == 0)
                <tr>
                    <td>
                        Process Baru
                    </td>
                    <td>
                        <select name="item_id[]" class="form-control">
                            @foreach ($inventorylists as $inventorylist)
                                <option value="{{$inventorylist->id}}">
                                {{$inventorylist->cat_name}} {{$inventorylist->cat_measurement}}
                                </option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="text" name="dimension[]" class='form-control' placeholder="PanjangxLebarxTinggi" required>
                    </td>
                    <td>
                        <input type="number" name="amount[]" class="form-control" placeholder="Jumlah" required >
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
                        <button class="add_form_field">Add New Field &nbsp; <span style="font-size:16px; font-weight:bold;">+ </span></button>
                    </td>
                </tr>
            @else
                @foreach($cuttings as $cutting)
                    <tr>
                        <td>
                            {{$reference_id}}
                        </td>
                        <td>
                            <input type="hidden" name="item_id[]" value={{$cutting->item_id}}>
                            {{$cutting->endproduct->cat_name}} {{$cutting->endproduct->cat_measurement}}
                        </td>
                        <td>
                            {{$cutting->dimension}}
                        </td>
                        <td>
                            <input type="number" name="amount[]" class="form-control" placeholder="Jumlah" required value={{$cutting->amount}}>
                        </td>
                        <td colspan="2">
                            <select name="status[]" class="form-control">
                                @foreach ($status as $value)
                                    <option value="{{$value->id}}">
                                    {{$value->name}}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                @endforeach
            @endif
        </table>
        {{Form::hidden('reference_id',$reference_id)}}
        {{Form::hidden('_method','POST')}}
        {{Form::submit('Submit',['class'=>'btn btn-primary form-control'])}}
    {!! Form::close() !!}
    
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

                $(wrapper).append('<tr><td>Process Baru</td><td><select name="item_id[]" class="form-control">@foreach($inventorylists as $inventorylist)<option value="{{$inventorylist->id}}">{{$inventorylist->cat_name}} {{$inventorylist->cat_measurement}}</option>@endforeach</select></td><td><input type="text" name="dimension[]" class="form-control" placeholder="PanjangxLebarxTinggi"></td><td><input type="number" name="amount[]" class="form-control" placeholder="Jumlah"></td><td><select name="status[]" class="form-control">@foreach($status as $value)<option value="{{$value->id}}">{{$value->name}}</option>@endforeach</select></td><td><a href="#" class="delete btn btn-danger">Delete</a></td></tr>'); //add input box
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