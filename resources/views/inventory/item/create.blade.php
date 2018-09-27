@extends ('layouts.app')

@section ('content')
<h1>Barang Baru</h1>
<hr>

<a href = "/inventory" class="btn btn-primary" style="margin-top:0px; margin-bottom:15px;">Kembali</a> <br>
{!! Form::open(['action'=> 'ItemController@store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

        <div class="form-group">
            {{Form::label('item_name','No Part')}}
            {{Form::text('item_name','',['class' => 'form-control', 'placeholder' => 'Nomor Barang'])}}
        </div>

        <div class="form-group">
            {{Form::label('item_qty','Total Dibutuhkan')}}
            {{Form::text('item_qty','',['class' => 'form-control', 'placeholder' => 'Kode Kategori Barang'])}}
        </div>

        <div class="form-group" >
            {{Form::label('inventory_id','Kategori Barang')}}
                <select name="inventory_id" class="form-control">
                    @foreach($items as $item)
                        @if($item->item_delete == null)
                            <option value="{{$item->id}}">{{ $item->cat_name }} {{$item->length}} x {{$item->width}}</option> 
                        @endif
                    @endforeach  
                </select>

            {{ Form::hidden($item->id)}}                  
        </div> 

         <div class="row">
            <div class="col-md-2">
            {{Form::label('measurement','Ukuran')}}
            </div>
             </div>
            
            
            <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                        
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                <div class="input-group-addon">P</div>
                                <input type="text" class="form-control" name="item_length" id="inlineFormInputGroup" placeholder="Panjang">
                            </div> 
                                  
                </div> 
            </div>
             
             <div class="col-md-2">
            <div class="form-group">
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <div class="input-group-addon">L</div>
                    <input type="text" class="form-control" name="item_width" id="inlineFormInputGroup" placeholder="Lebar">
                </div>       
            </div>
            </div>

            <div class="col-md-2">
            <div class="form-group">
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <div class="input-group-addon">T</div>
                    <input type="text" class="form-control" name="item_height" id="inlineFormInputGroup" placeholder="Tinggi">
                </div>       
            </div>
            </div>

            </div> 

         <div class="form-group">
            {{Form::label('item_assembly','Kode Pembentukan')}}
            {{Form::text('item_assembly','',['class' => 'form-control', 'placeholder' => 'Kode Pembentukan'])}}
        </div>  

        <div class="form-group">
            {{Form::label('item_description','Keterangan')}}
            {{Form::textarea('item_description','',['class' => 'form-control', 'placeholder' => 'Keterangan'])}}
        </div>  

        <div class="form-group" style="float:right">
            {{Form::submit('Submit',['class'=>'btn btn-success'])}}
        </div> 

{!! Form::close() !!}
@endsection