@extends('Backend.master')
@section('main')

<main class="app-content">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Sl</th>
      <th scope="col">Name</th> 
      <th scope="col">Contact</th>
       <th scope="col">Email</th> 
      <th scope="col">Action</th>
     
      
    </tr>
  </thead>

  @foreach($users as $key=>$data)


    <tr>
      <th scope="users">{{$key+1}}</th>
      <td >{{$data->name}}</td>
      <td>{{$data->contact}}</td>
      <td >{{$data->email}}</td>
      
      

      <td>
        <a class="btn btn-warning" href="">Edit</a>
        <a class="btn btn-danger" href="{{route('user.delete',$data->id)}}">Delete</a>
        <a class="btn btn-info" href="">View</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

{{$users->links()}}

</main>

@stop
