@extends('layouts.app')

@section('content')
<h1>Proses Penggabungan</h1>
<hr>
{!! Form::open(['action' => 'AssemblyController@storee','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">Nama Pembentukan</label>
      <input type="text" class="form-control" name="ass_name" id="inputEmail4" placeholder="Pembentukan">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">No Pembentukan</label>
      <input type="text" class="form-control" name="ass_number" id="inputPassword4" placeholder="Kode">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Status</label>
      <input type="text" class="form-control" name="ass_status" id="inputPassword4" placeholder="Kode">
    </div>
    <div class="form-group col-md-3">
      <label for="inputPassword4">Tanggal Pembentukan</label>
      <input type="date" class="form-control" name="ass_creation" id="inputPassword4" placeholder="Kode">
    </div>
    <div class="form-group col-md-3">
      <label for="inputPassword4">Tanggal Penyelesaian</label>
      <input type="date" class="form-control" name="ass_final" id="inputPassword4" placeholder="Kode">
    </div>
  </div>

  <div class="row">
    <div class="form-group col-md-6">
                {{Form::label('ass_desc','Keterangan')}}
                {{Form::textarea('ass_desc','',['class' => 'form-control', 'placeholder' => 'Keterangan'])}}
            </div>  
        
  </div>
 
    <table class="table table-striped" id="selectInput">        
        <tr>
            <th>Barang</th>
            <th>Kategori</th>
            <th>Jumlah</th>
            <th>Rincian Pekerjaan</th>
           
        </tr>
        <tr>
            <td>
                <select name="item_id[]" class="form-control">
                    @foreach ($items as $balok)
                        <option value="{{$balok->id}}">
                        {{$balok->item_name}} {{$balok->item_length}} x {{$balok->item_width}} x {{$balok->item_height}} 
                        </option>
                    @endforeach
                </select>
            </td>

             <td>
                <select name="ass_dimension[]" class="form-control">
                    @foreach ($cats as $balok)
                        <option value="{{$balok->id}}">
                        {{$balok->cat_name}}
                        </option>
                    @endforeach
                </select>
            </td>

            <td>
                <input type="number" name="ass_unit[]" class="form-control" placeholder="Amount" required>
            </td>
           
           
            <td>
                <select name="ass_assignment[]" class="form-control">
                <option selected>Vertical</option>
                  <option>Horizontal</option>
                  <option>list Sponeg</option>
                  <option>Dor Panel</option>
                </select>
            </td>

          


        </tr>
        
    </table>
    <button class="add_form_field btn btn-info" type="button" style="margin-bottom:5px;">Tambah Barang &nbsp; <span style="font-size:16px; font-weight:bold;">+ </span></button>
  </div>
        {{Form::hidden('_method','POST')}}    
        {{Form::submit('Submit',['class'=>'btn btn-success form-control'])}}
    
  </div>
  
  
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
                $(wrapper).append('<tr><td><select name="item_id[]" class="form-control">@foreach($items as $balok)<option value="{{$balok->id}}">{{$balok->item_name}} {{$balok->item_length}} x {{$balok->item_width}} x {{$balok->item_height}}</option>@endforeach</select></td><td><select name="ass_dimension[]" class="form-control">@foreach ($items as $balok)<option value="{{$balok->id}}">{{$balok->item_length}} x {{$balok->item_width}} x {{$balok->item_height}}</option>@endforeach</select></td><td><input type="number" name="ass_unit[]" class="form-control" placeholder="Amount" required></td><td><select name="ass_assignment[]" class="form-control"> <option selected>Vertical</option><option>Horizontal</option><option>list Sponeg</option><option>Dor Panel</option></select></td><td><a href="#" class="delete btn btn-danger">Delete</a></td></tr>');
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