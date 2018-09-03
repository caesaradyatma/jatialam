@extends('layouts.app')

@section('content')
<div class="container">
<form action={{route('datatracking.show')}} method="GET">
    <div class="form-group">
      <label for="usr">Name:</label>
      <input type="text" class="form-control" name="test" placeholder="Keyword" value="{{ isset($test) ? $test : ''}}">
    </div>
    <div class="form-group">
        <button class="btn btn-success" type="submit">Search</button>
    </div>
  </form>
</div>

@endsection