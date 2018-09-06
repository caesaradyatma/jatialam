@extends('layouts.app')

@section('content')
<div class="container">
<form action={{route('datatracking.show')}} method="GET">
  <div class="col-md-12">
    <label for="validationServerUsername">Kode Kayu</label>
    <div class="input-group">
      <input type="text" class="form-control form-control is-invalid" id="validationServerUsername" name="test" placeholder="Username" aria-describedby="inputGroupPrepend3" required>
    </div>
  </div>
</div>
    <div class="form-group">
        <button class="btn btn-success" type="submit">Search</button>
    </div>
  </form>

  



@endsection