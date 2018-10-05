@extends('layouts.app')

@section('content')
<h1>Procurement Form</h1>

{!! Form::open(['action' => 'PurchasingsController@store','method' => 'POST']) !!}
    <table class="table table-striped" id="selectInput">
        <tr>
            <th>Tanggal Kedatangan</th>
            <th>Pengirim</th>
            <th>Nama Barang</th>
            <th>Dimensi</th>
            <th>Jumlah Barang Bagus</th>
            <th>Jumlah Barang Buruk</th>
            <th>Hapus</th>
        </tr>
        <tr>
            <td>
                <input type="date" name="arrival_date" class="form-control" placeholder="Arrival Date" required>
            </td>
            <td>
                <input type="text" name="sender_pic" class="form-control" placeholder="Sender PIC" required>
            </td>
            <td>
                <select name="item_id[]" class="form-control">
                    @foreach($items as $item)
                        <option value="{{$item->id}}">
                            {{$item->cat_name}} {{$item->cat_measurement}}
                        </option>
                    @endforeach
                </select>
            </td>
            <td>
                <input type="text" name="dimension[]" class="form-control" placeholder="panjang x lebar x tinggi">
            </td>
            <td>
                <input type="number" name="amount[]" class="form-control" placeholder="Barang Bagus" required>
            </td>
            <td>
                <input type="number" name="rejected_amount[]" class="form-control" placeholder="Barang Buruk" required>
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

                $(wrapper).append('<tr><td></td><td></td><td><select name="item_id[]" class="form-control">@foreach($items as $item)<option value="{{$item->id}}">{{$item->cat_name}} {{$item->cat_measurement}}</option>@endforeach</select></td><td><input type="text" name="dimension[]" class="form-control" placeholder="panjang x lebar x tinggi"></td></td><td><input type="number" name="amount[]" class="form-control" placeholder="Barang Bagus" required></td><td><input type="number" name="rejected_amount[]" class="form-control" placeholder="Barang Buruk" required></td><td><a href="#" class="delete btn btn-danger">Delete</a></td></tr>'); //add input box
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