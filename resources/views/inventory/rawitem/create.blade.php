@extends ('layouts.app')

@section ('content')
<hr>
<a href = "/balok" class="btn btn-primary" style="margin-top:0px; margin-bottom:15px;">Kembali</a> <br>
{!! Form::open(['action'=> 'BalokController@store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

        <div class="form-group">
            {{Form::label('code','Kode Balok')}}
            {{Form::text('code','',['class' => 'form-control', 'placeholder' => 'Nomor Balok'])}}
        </div>

        <div class="form-group">
            {{Form::label('quantity','Total Barang')}}
            {{Form::text('quantity','',['class' => 'form-control', 'placeholder' => 'Kode Kategori Barang'])}}
        </div>

         <div class="form-group">
                {{Form::label('balok_measure','Ukuran')}}
                {{Form::text('balok_measure','',['class' => 'form-control', 'placeholder' => 'Ukuran'])}}
         </div> 

        <div class="form-group">
                {{Form::label('details','Keterangan Balok')}}
                {{Form::textarea('details','',['class' => 'form-control', 'placeholder' => 'Catatan'])}}
         </div> 


        <div class="form-group" style="float:right">
            {{Form::submit('Submit',['class'=>'btn btn-success'])}}
        </div> 

{!! Form::close() !!}
@endsection