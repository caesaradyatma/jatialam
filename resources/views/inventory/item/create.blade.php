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
                            <option value="{{$item->id}}">{{ $item->cat_name }}</option> 
                        @endif
                    @endforeach  
                </select>

            {{ Form::hidden($item->id)}}                  
        </div> 

        <div class="form-group">
                {{Form::label('item_measurement','Ukuran')}}
                {{Form::text('item_measurement','',['class' => 'form-control', 'placeholder' => 'Ukuran'])}}
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