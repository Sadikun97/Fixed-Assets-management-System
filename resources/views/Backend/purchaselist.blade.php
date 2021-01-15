@extends('Backend.master')
@section('main')

<main class="app-content">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Sl</th>
      <th scope="col">Total</th>
      <th scope="col">Purchse By</th> 
      <th scope="col">Action</th>
     
      
    </tr>
  </thead>

  

  @foreach($purchases as $key=>$data)


    <tr>
      <th scope="purchases">{{$key+1}}</th>
      <td>{{$data->total}}</td>
      <td>{{$data->purchase_by}}</td>
     
      <td>
      @if(auth()->user()->user_type == 'admin')
        <a class="btn btn-warning" href="#">Edit</a>
        <a class="btn btn-danger" href="{{route('purchase.delete',$data->id)}}">Delete</a>
        <a class="btn btn-info" href="{{route('purchasedetails.view',$data->id)}}">View</a>

        @else
        <span class="btn btn-warnig">No action</span>
        @endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table>


</main>

@stop
