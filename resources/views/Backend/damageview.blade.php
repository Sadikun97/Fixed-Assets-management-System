@extends('Backend.master')
@section('main')

<main class="app-content">

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
      <th scope="col">Item's Name</th>
      <th scope="col">Reason</th>
      <th scope="col">Is Resonsible</th>
      <th scope="col">Action</th>
     
      
    </tr>
  </thead>

  

  @foreach($damages as $key=>$data)


    <tr>
      <th scope="damages">{{$key+1}}</th>
      <!-- <td>{{$data->item_distribution_id}}</td> -->
       <td >{{optional($data->itemRelation)->name}}</td>
      
      <td>{{$data->reason}}</td>
       <td>{{$data->is_responsible}}</td>
     
      <td>
      @if(auth()->user()->user_type == 'admin')
        <a class="btn btn-warning" href="">Edit</a>
        <a class="btn btn-danger" href="">Delete</a>
        <a class="btn btn-info" href="">View</a>
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
