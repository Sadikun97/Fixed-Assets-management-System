@extends('Backend.master')
@section('main')

<main class="app-content">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Sl</th>
      <th scope="col">Item's Id</th>
      <th scope="col">Employee's ID</th> 
      <th scope="col">Location</th>
      <th scope="col">Action</th>
     
      
    </tr>
  </thead>

  

  @foreach($itemdistributions as $key=>$data)


    <tr>
      <th scope="itemdistributions">{{$key+1}}</th>
      <td>{{$data->item_id}}</td>
      <td>{{$data->employee_id}}</td>
       <td>{{$data->location}}</td>
     
      <td>
        <a class="btn btn-warning" href="">Edit</a>
        <a class="btn btn-danger" href="">Delete</a>
        <a class="btn btn-info" href="">View</a>
        <a class="btn btn-secondary" herf="">Damage</a>
      </td>
    </tr>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Item in Damage</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <form method="post" action="{{route('damage.create')}}">
@csrf

<div .col-md-3 .offset-md-3 class="form-group">
            <label for="item_id">Under Item's</label>
            <select name="item_id" id="item_id" class="form-control">
                <option value="0">Select a Item</option>
                @foreach($itemdshow as $data)
                <option value="{{$data->id}}">{{$data->name}}</option>
                @endforeach
            </select>
        </div>

  <div class="form-group">
    <label for="reason">Reason</label>
    <input type="string" name="reason" class="form-control"  placeholder="Enter the reason">
  </div>

  <div class="form-group">
    <label for="reason">Is Responsible</label>
    <input type="string" name="is responsible" class="form-control"  placeholder="is responsible">
  </div>
  

      <div class="modal-footer">
    
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
    @endforeach
  </tbody>
</table>


</main>

@stop
