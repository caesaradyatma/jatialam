@extends('layouts.app')

@section('content')

<h1>Dashboard Jati Alam</h1>
<hr>


<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-warning">
                <div class="panel-heading"><h4 style="font-weight: bold">Produksi Pembentukan</h4></div>
                <div class="panel-body">
                                <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Kode</th>
                                            <th>Bentuk Barang</th>
                                            <th>Tanggal Kerja</th>
                                            <th>Tanggal Penyelesaian</th>
                                            <th>Aksi</th>
                                        
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($ass_detail->unique('ass_name') as $ass)
                                        <tr>   
                        
                                            <td>{{$ass->ass_number}}</td>
                                            <td>{{$ass->ass_name}}</td>
                                            <td>{{$ass->creation_date}}</td>
                                            <td>{{$ass->final_date}}</td>
                                            <td>{{$ass->ass_status}}</td>
                                            <td><i class="glyphicon glyphicon-exclamation-sign" style="color:rgb(239, 232, 158);"></i></td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                </table>
                                {{$ass_detail->links()}}
                     
               
                </div>
            <a href="/assembly">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
            </div>
        </div>

        <div class="col-lg-4">
                <div class="panel panel-info">
                    <div class="panel-heading"><h4 style="font-weight: bold">Gambaran Gudang</h4></div>
                        <div class="panel-body">
                            <div class="well" style="border-left: thick solid #4AADF1;">
                            <h4> Total Barang : </h4>
                            </div>
                            <hr>
                            <div class="well" style="border-left: thick solid #5CDFC5;">
                                <h4> Kebutuhan Barang : {{$item_req}} </h4>
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
                    <div class="panel-heading"><h4 style="font-weight: bold">Pembelian Barang</h4></div>
                    <div class="panel-body">
                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Tanggal Datang</th>
                                            <th>Kode</th>
                                           
                                        
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($pro_detail->unique('reference_id') as $ass)
                                        <tr>   
                        
                                            <td>{{$ass->arrival_date}}</td>
                                            <td><a href="purchasings/{{$ass->reference_id}}">{{$ass->reference_id}}</td>
                                            
                                        </tr>
                                        @endforeach
                                        </tbody>
                                </table>
                                {{$pro_detail->links()}}
                      
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


