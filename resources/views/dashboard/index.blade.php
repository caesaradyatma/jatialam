@extends('layouts.app')

@section('content')

<h1>Dashboard Jati Alam</h1>
<hr>


<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-warning">
                <div class="panel-heading"><h4 style="font-weight: bold">Kontrol Barang</h4></div>
                <div class="panel-body">
                                <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Nama Barang</th>
                                            <th>Kode</th>
                                            <th>Dimensi</th>
                                            <th>Aksi</th>
                                        
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>   
                                            <td></td>
                                            <td></td>
                                            <td><i class="glyphicon glyphicon-exclamation-sign" style="color:rgb(239, 232, 158);"></i></td>
                                        </tr>
                                        </tbody>
                                </table>
                     
               
                </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
            </div>
        </div>

        <div class="col-lg-6">
                <div class="panel panel-info">
                    <div class="panel-heading"><h4 style="font-weight: bold">Gambaran Gudang</h4></div>
                        <div class="panel-body">
                            <div class="well" style="border-left: thick solid #4AADF1;">
                            <h4> Total Barang : </h4>
                            </div>
                            <hr>
                            <div class="well" style="border-left: thick solid #5CDFC5;">
                                <h4> Kebutuhan Barang :  </h4>
                            </div>
                            <hr>
                            <div class="well" style="border-left: thick solid #4B39FB;">
                                <h4> Barang Jadi : </h4>
                             </div>     
                        </div>
                </div>
        </div>


    </div>

     <hr>

    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-success">
                <div class="panel-heading"><h4 style="font-weight: bold">Produksi Bahan</h4></div>
                    <div class="panel-body">
                        <div class="w3-panel w3-border w3-light-grey w3-round-large">
                            <div class="row">
                            <div class="col-lg-4">
                                        <h5 align="center">Tanggal</h5>
                                </div>
                                <div class="col-lg-4">
                                        <h5 align="center">Nomor Referensi</h5>
                                </div>
                                <div class="col-lg-4">
                                        <h5 align="center">Status</h5>
                                </div>
                            </div>
                            <div class="w3-panel w3-border w3-light-grey w3-round-large"></div>
                        </div> 
                        
                        <div class="row">
                                <div class="col-lg-4">
                                        <h5 align="center"></h5>
                                </div>
                                <div class="col-lg-4">
                                        <h5 align="center"></h5>
                                </div>
                                <div class="col-lg-4">
                                        <h5 align="center" style="background-color: yellow">Pending</h5>
                                </div> 
                        </div>

                        <hr>

                        <div class="row">
                                <div class="col-lg-4">
                                        <h5 align="center"></h5>
                                </div>
                                <div class="col-lg-4">
                                        <h5 align="center"></h5>
                                </div>
                                <div class="col-lg-4">
                                        <h5 align="center" style="background-color: yellow">Pending</h5>
                                </div> 
                        </div>

                        <hr>

                        <div class="row">
                                <div class="col-lg-4">
                                        <h5 align="center"></h5>
                                </div>
                                <div class="col-lg-4">
                                        <h5 align="center"></h5>
                                </div>
                                <div class="col-lg-4">
                                        <h5 align="center" style="background-color: #B3F7B7">Finished</h5>
                                </div> 
                        </div>

                        <hr>

                    </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="panel panel-primary">
                    <div class="panel-heading"><h4 style="font-weight: bold">Pengiriman Order</h4></div>
                    <div class="panel-body">
                        <div class="well">
                            <div class="row">
                                <div class="col-lg-4"></div>
                                <div class="col-lg-12"><hr></div>
                                <div class="col-lg-6"><h5><b>Jumlah Kayu Dipesan</b></h5> <h2>11</h2></div>
                            </div>
                        </div>
                      
                    </div>
                    <a href="#">
                      <div class="panel-footer">
                          <span class="pull-left">View Details</span>
                          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                          <div class="clearfix"></div>
                      </div>
                  </a>
                  </div>
        </div>
     </div>

    <hr>

</div>

@endsection


