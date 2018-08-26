@extends ('layouts.app')

@section ('content')
    <h1>Barang Baru</h1>
    <hr>

    <a href = "/inventory" class="btn btn-primary" style="margin-top:0px; margin-bottom:15px;">Kembali</a> <br>
    {!! Form::open(['action'=> 'InventoryController@store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

            <div class="form-group">
                {{Form::label('cat_name','Nama Kategori Barang')}}
                {{Form::text('cat_name','',['class' => 'form-control', 'placeholder' => 'Kategori Barang'])}}
            </div>

            <div class="form-group">
                {{Form::label('cat_code','Kode')}}
                {{Form::text('cat_code','',['class' => 'form-control', 'placeholder' => 'Kode Kategori Barang'])}}
            </div>

            <div class="form-group">
                    {{Form::label('cat_measurement','Ukuran')}}
                    {{Form::text('cat_measurement','',['class' => 'form-control', 'placeholder' => 'Ukuran'])}}
                </div>  

            <div class="form-group" style="float:right">
                {{Form::submit('Submit',['class'=>'btn btn-success'])}}
            </div> 

    {!! Form::close() !!}

@endsection