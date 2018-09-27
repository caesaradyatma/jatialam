@extends('layouts.app')

@section('content')
<h1>Proses Penggabungan</h1>
<hr>
<form>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">Nama Pembentukan</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Pembentukan">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">No Pembentukan</label>
      <input type="text" class="form-control" id="inputPassword4" placeholder="Kode">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Pintu</label>
      <input type="number" class="form-control" id="inputPassword4" placeholder="Tujuan Pintu">
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputCity">Barang</label>
      <input type="text" class="form-control" id="inputCity">
    </div>

     <div class="form-group col-md-2">
      <label for="inputCity">Ukuran</label>
      <input type="text" class="form-control" id="inputCity">
    </div>

    <div class="form-group col-md-2">
      <label for="inputCity">Dimensi</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Rincian Pekerjaan</label>
      <select id="inputState" class="form-control">
        <option selected>Vertical</option>
        <option>Horizontal</option>
        <option>list Sponeg</option>
        <option>Dor Panel</option>

      </select>
    </div>

    <div class="form-group col-md-2">
      <label for="inputZip">Jumlah</label>
      <input type="text" class="form-control" id="inputZip">
    </div>

     <div class="form-group">
                {{Form::label('keterangan','Catatan')}}
                {{Form::textarea('keterangan','',['class' => 'form-control', 'placeholder' => 'Catatan'])}}
       </div>

        {{Form::submit('Submit',['class'=>'btn btn-success form-control'])}}
    
  </div>


  



  
</form>


@endsection