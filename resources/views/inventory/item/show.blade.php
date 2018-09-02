@extends ('layouts.app')

@section ('content')

@foreach($items as $item)
    <tr>
        <td>{{$item->item->cat_name}}</td>
      
    </tr>
@endforeach

@endsection