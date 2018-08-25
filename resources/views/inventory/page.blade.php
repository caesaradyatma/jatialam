@extends ('layouts.app')

@section ('content')

<div class="container">
    <h1 align="center">Inventory</h1>
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-success">
                    <div class="panel-heading"></div>
                    <div class="panel-body">
                        <center><a href="/inventory" class="btn btn-success"><h4>Data Barang</h4></a></center>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">  
                <div class="panel panel-primary">
                    <div class="panel-heading"></div>
                        <div class="panel-body">
                            <center><a href="#" class="btn btn-primary"><h4>Tambah Kategori Barang</h4></a> </center>
                        </div>
                </div>
            </div>
        </div>
</div>

@endsection