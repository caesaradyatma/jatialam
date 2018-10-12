@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-5">
            <h1>Laporan Produksi</h1>
        </div>
        <div class="col-sm-7">
            <small>Pilih ID proses</small>
            {!! Form::open(['method' => 'POST','id' => 'getContent']) !!}
                <table class="table">
                    <tr>
                        <td>
                            <select name="reference_id" class="form-control" id="reference_id">
                                    <option value="0">
                                        All
                                    </option>
                                @foreach ($ids as $id)
                                    <option value="{{$id->reference_id}}">
                                        {{$id->reference_id}}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        {{--  <td>
                            <input type="date" name="inputDate" id="inputDate" class="form-control">
                        </td>  --}}
                    </tr>
                    <tr>
                        <td colspan="2">
                            {{Form::hidden('_method','POST')}}
                            {{Form::submit('Filter',['class'=>'btn btn-primary form-control'])}}
                        </td>
                    </tr>
                </table>
            {!! Form::close() !!}
        </div>
    </div>
    <hr>
    <table class="table table-striped" id="selectInput">
        <tr>
            <th>Reference ID</th>
            <th>Nama Proses</th>
            <th>Status</th>
            <th>Diperbarui Pada</th>
        </tr>
        @foreach($reports as $report)
            <tr id="report-content">
                <td>{{$report->reference_id}}</td>
                <td>{{$report->report_status->category}}</td>
                <td>{{$report->report_status->name}}</td>
                <td>{{$report->updated_at}}</td>
            </tr>
        @endforeach
    </table>
@endsection

@section('scripts')
    <script>
    $(document).ready(function() {
        $('#getContent').submit(function(e){
            e.preventDefault();
            var reference_id = $('#reference_id').val();
            $.ajax({
                type:'POST',
                url:'/report',
                data:$(this).serialize(),
                success:function(data){
                    console.log(data);
                    $("#report-content").html("<td>"+data['ref_id']+"</td><td>"+data['stage_name']+"</td><td>"+data['status_name']+"</td><td>"+data['updated_at']['date']+"</td>");
                }
            })
        });
        /*var max_fields      = 10;
        var wrapper         = $("#selectInput");
        var add_button      = $(".update_table");
        
        var x = 1;
        $(add_button).click(function(e){
            e.preventDefault();
            if(x < max_fields){
                x++;

                $(wrapper).html('<tr><td>test</td></tr>'); //add input box
            }
            else
            {
                alert('You Reached the limits')
            }
        });

        $(wrapper).on("click",".delete", function(e){
            e.preventDefault(); $(this).parents('tr').remove(); x--;
        })*/
    });
  </script>
@endsection