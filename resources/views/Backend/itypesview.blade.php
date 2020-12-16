@extends('Backend.master')
@section('main')

<main class="app-content">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Sl</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th> 
      <th scope="col">Action</th>
     
      
    </tr>
  </thead>

  

  @foreach($item_types as $key=>$data)


    <tr>
      <th scope="item_types">{{$key+1}}</th>
      <td>{{$data->name}}</td>
      <td>{{$data->description}}</td>
     
      <td>
        <a class="btn btn-warning" href="">Edit</a>
        <a class="btn btn-danger" href="">Delete</a>
        <a class="btn btn-info" href="">View</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>


</main>

@stop
