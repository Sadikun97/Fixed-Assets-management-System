@extends('Backend.master')
@section('main')

<main class="app-content">
<!-- code for search -->
<div style="display: flex;
    justify-content: flex-end;
    margin-bottom:20px">
<div class="app-search" style="width:20%">
      
      <input class="app-search__input" style="color:blue;width:100%"  type="search" placeholder="Search"/>
      <button class="app-search__button"><i class="fa fa-search"></i></button>
</div>
</div>


<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Sl</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th> 
      <th scope="col">Action</th>
     
      
    </tr>
  </thead>

  

  @foreach($item_types as $key=>$data)


    <tr>
      <th scope="item_types">{{$key+1}}</th>
      <td>{{$data->name}}</td>
      <td>{{$data->description}}</td>
     
      <td>
        <a class="btn btn-warning" href="{{route('it.edit',$data->id)}}">Edit</a>
        <a class="btn btn-danger" href="{{route('it.delete',$data->id)}}">Delete</a>
        <a class="btn btn-info" href="">View</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>


</main>

@stop
