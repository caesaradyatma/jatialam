@extends ('layouts.app')

@section ('content')
    <h1>Barang Baru</h1>
    <hr>
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

            <div class="form-group" style="margin-left:20%">
                {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
            </div> 

    {!! Form::close() !!}

@endsection