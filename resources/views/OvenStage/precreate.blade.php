@extends('layouts.app')

@section('content')

    {{--  Button trigger modal  --}}
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        Launch demo modal
    </button>
    
    {{--  Modal  --}}
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Pilih Reference ID</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
    </div>

    {!! Form::open(['action' => 'OvenStageController@get_ref','method' => 'POST']) !!}
        <table class="table table-striped">
            <tr>
                <th colspan="2">Reference ID</th>
            </tr>
            <tr>
                <td>
                    <select name="reference_id" class="form-control" id="reference_id">
                        @foreach ($cuttings as $cutting)
                            <option value="{{$cutting->reference_id}}">
                                {{$cutting->reference_id}}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    {{Form::hidden('_method','POST')}}
                    {{Form::submit('Submit',['class'=>'btn btn-primary form-control'])}}
                </td>
            </tr>
        </table>
    {!! Form::close() !!}

@endsection