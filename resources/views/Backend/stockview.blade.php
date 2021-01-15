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
    
    <a style="float: right" class="btn btn-primary" href="#">
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
      <th scope="col">Quantity</th>
      <th scope="col">action</th>
     
      
    </tr>
  </thead>

  

  @foreach($stocks as $key=>$data)


    <tr>
      <th scope="stocks">{{$key+1}}</th>
      <td >{{optional($data->itemRelation)->name}}</td>
       <td>{{$data->sum}}</td>
     
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
