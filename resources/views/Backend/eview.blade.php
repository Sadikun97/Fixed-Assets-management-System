@extends('Backend.master')
@section('main')

<main class="app-content">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Sl</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Contact</th>
       <th scope="col">Email</th> 
      <th scope="col">Image</th> 
       <th scope="col">Designation</th>
      <th scope="col">Action</th>
     
      
    </tr>
  </thead>

  @foreach($employees as $key=>$employee)


    <tr>
      <th scope="employee">{{$key+1}}</th>
      <td >{{$employee->name}}</td>
      <td>{{$employee->address}}</td>
      <td>{{$employee->contact}}</td>
      <td >{{$employee->email}}</td>
      <td ><img style="width: 100px; height: 80px;" src="{{asset('uploads/'.$employee->image)}}"></td>
      <td >{{$employee->designation}}</td>
      
      

      <td>
        <a class="btn btn-warning" href="">Edit</a>
        <a class="btn btn-danger" href="{{route('employee.delete',$employee->id)}}">Delete</a>
        <a class="btn btn-info" href="">View</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

{{$employees->links()}}

</main>

@stop
