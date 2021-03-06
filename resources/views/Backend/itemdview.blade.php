@extends('Backend.master')
@section('main')

<main class="app-content">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Sl</th>
      <th scope="col">Item's Name</th>
      <th scope="col">Employee's Name</th> 
      <th scope="col">Location</th>
      <th scope="col">Action</th>
     
      
    </tr>
  </thead>

  
  @foreach($itemdistributions as $key=>$data)


    <tr>
      <td scope="itemdistributions">{{$key+1}}</td>
      <td >{{optional($data->itemRelation)->name}}</td>
      <td>{{optional($data->employeeRelation)->name}}</td>
       <td>{{$data->location}}</td>
       
      <td>
        <a class="btn btn-warning" href="">Edit</a>
        <a class="btn btn-danger" href="{{route('itemd.delete',$data->id)}}">Delete</a>
        <a class="btn btn-info" href="">View</a>
        <a class="btn btn-secondary" href="{{route('damage',$data->id)}}">Damage</a>
      </td>
    </tr>

   
    @endforeach
  </tbody>
</table>


</main>

@stop
