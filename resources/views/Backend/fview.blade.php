@extends('Backend.master')
@section('main')

<main class="app-content">

<!-- code for search  -->
<div class="container">
          <div class="row">
              <div class="col-md-10">
              <div class="app-search" style="width:20%">
      
      <form action="{{route('fview')}}">
      <input class="app-search__input" style="color:blue;width:100%" name="search"  type="search" placeholder="Search"/>
      <button class="app-search__button"><i class="fa fa-search"></i></button>
      </form>

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
      <th scope="col">Item types Name</th>
      <th scope="col">Item's Name</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
     
      
    </tr>
  </thead>

  

  @foreach($item as $key=>$data)


    <tr>
      <th scope="item">{{$key+1}}</th>
      <td >{{optional($data->itemTypesRelation)->name}}</td>
      <td>{{$data->name}}</td>
      <td><a href="{{route('item.active',$data->id)}}">

     @if($data->status)
       Active

      @else
      Inactive


     @endif



    </a></td>
     
      <td>

      @if(auth()->user()->user_type == 'admin')
        <a class="btn btn-warning" href="{{route('item.edit',$data->id)}}">Edit</a>
        <a class="btn btn-danger" href="{{route('item.delete',$data->id)}}">Delete</a>

        @else
        <span class="btn btn-warnig">No action</span>
        @endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

{{$item->links()}}


</main>

@stop