@extends('Backend.master')
@section('main')

<main class="app-content">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Sl</th>
      <th scope="col">Item's Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">action</th>
     
      
    </tr>
  </thead>

  

  @foreach($stocks as $key=>$data)


    <tr>
      <th scope="stocks">{{$key+1}}</th>
      <td>{{$data->itemRelation->name}}</td>
       <td>{{$data->sum}}</td>
     
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
