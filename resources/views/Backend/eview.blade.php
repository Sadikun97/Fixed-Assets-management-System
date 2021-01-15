@extends('Backend.master')
@section('main')

<main class="app-content">
<!-- code for search -->
<div class="container">
          <div class="row">
              <div class="col-md-10">
              <div class="app-search" style="width:20%">
      
      <input class="app-search__input" style="color:blue;width:100%"  type="search" placeholder="Search"/>
      <button class="app-search__button"><i class="fa fa-search"></i></button>
</div>
              </div>
              <div class="col-md-2">
                        
<div>
    
<a style="float: right" type="submit" onclick="window.print()" class="btn btn-primary" href="#">
           Print</a>
    
    </div>
              </div>

          </div>
      </div>

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
