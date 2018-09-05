@extends('layouts.app')

@section('content')

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
                <td>
                    {{Form::hidden('_method','POST')}}
                    {{Form::submit('Submit',['class'=>'btn btn-primary form-control'])}}
                    <button type="submit" class="btn btn-primary form-control" id="select_ref">Select Reference ID</button>
                </td>
            </tr>
        </table>
    {!! Form::close() !!}

@endsection