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

            <div class="row">
            <div class="col-md-2">
            {{Form::label('cat_measurement','Ukuran')}}
            </div>
             </div>
            
            
            <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                        
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                <div class="input-group-addon">P</div>
                                <input type="text" class="form-control" name="length" id="inlineFormInputGroup" placeholder="Panjang">
                            </div> 
                                  
                </div> 
            </div>
             
             <div class="col-md-2">
            <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon">L</div>
                            <input type="text" class="form-control" name="width" id="inlineFormInputGroup" placeholder="Lebar">
                        </div>       
            </div>
            </div>
            </div>

            <div class="form-group">
                {{Form::label('keterangan','Catatan')}}
                {{Form::textarea('keterangan','',['class' => 'form-control', 'placeholder' => 'Catatan'])}}
            </div>

    
        {{Form::submit('Submit',['class'=>'btn btn-primary form-control'])}}
           

    {!! Form::close() !!}

@endsection