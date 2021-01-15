@extends('Backend.master')
@section('main')

<main class="app-content">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Sl</th>
      <th scope="col">Item's Name</th>
      <th scope="col">Quantity</th> 
      <th scope="col">Purchase Id</th>
      <th scope="col">Unit Price</th> 
      <th scope="col">Total</th>
    
     
      
    </tr>
  </thead>

  

  @foreach($purchases->details as $key=>$data)


    <tr>
      <th scope="purchases">{{$key+1}}</th>
      <td>{{$data->item->name}}</td>
      <td>{{$data->quantity}}</td>
      <td>{{$data->purchase_id}}</td>
      <td>{{$data->price}}</td>
      <td>{{$data->total}}</td> 
  
     
    </tr>
    @endforeach
  </tbody>
</table>


</main>

@stop
