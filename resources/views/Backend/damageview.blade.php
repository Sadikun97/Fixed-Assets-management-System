@extends('Backend.master')
@section('main')

<main class="app-content">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Sl</th>
       <th scope="col">Item's Name/th>
      <th scope="col">Reason/th>
      <th scope="col">Is Responsible</th>
     
      
    </tr>
  </thead>

  

  @foreach($damages as $key=>$data)


    <tr>
      <th scope="damages">{{$key+1}}</th>
      <td >{{$data->item_distribution_id}}</td>
      <td>{{$data->reason}}</td>
      <td>{{$data->is_responsible}}</td>
     
      <td>
        <a class="btn btn-warning" href="{{route('item.edit',$data->id)}}">Edit</a>
        <a class="btn btn-danger" href="{{route('item.delete',$data->id)}}">Delete</a>
        <a class="btn btn-info" href="">View</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

</main>

@stop