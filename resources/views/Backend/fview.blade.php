@extends('Backend.master')
@section('main')

<main class="app-content">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Sl</th>
      <th scope="col">Enter Item types id</th>
      <th scope="col">Code</th>
      <th scope="col">Name</th>
      <!-- <th scope="col">Image</th> -->
      <th scope="col">Action</th>
     
      
    </tr>
  </thead>

  

  @foreach($item as $key=>$data)


    <tr>
      <th scope="item">{{$key+1}}</th>
      <td >{{$data->item_types_id}}</td>
      <td>{{$data->code}}</td>
      <td>{{$data->name}}</td>
     
      <td>
        <a class="btn btn-warning" href="{{route('item.edit',$data->id)}}">Edit</a>
        <a class="btn btn-danger" href="{{route('item.delete',$data->id)}}">Delete</a>
        <a class="btn btn-info" href="">View</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

{{$item->links()}}


</main>

@stop