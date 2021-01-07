@extends('backend.master')
@section('main')
<main class="app-content">
<h1>Add new product</h1>
    <form action="{{route('purchases.create')}}"  method="post">
        @csrf
        <div .col-md-3 .offset-md-3 class="form-group">
            <label for="items_id">Under Item's</label>
            <select name="items_id" id="items_id" class="form-control">
                <option value="0">Select a Item</option>

                @foreach($purchases as $data)
                <option value="{{$data->id}}">{{$data->name}}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="text">Quantity</label>
            <input name="quantity" required placeholder="Enter Quantity" type="text" class="form-control" id="quantity"\
                >
        </div>

        <div class="form-group">
            <label for="text">Price</label>
            <input name="price" required placeholder="Enter Price" type="text" class="form-control" id="price"\
                >
        </div>
        
        <button style="float: right" type="submit" class="btn btn-primary">Add to cart</button>
    </form>

    <div>
      <div class="table-resonsive">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Items Name </th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>

@if(session('cart'))
    @foreach(session('cart') as $key=>$data)

    <tr>
      <th> {{1}}</th>
      <td>{{$data['item_id']}}</td>
      <td>{{$data['quantity']}}</td>
      <td>{{$data['price']}}</td>

    </tr>
    @endforeach
    @endif

   
</tbody>


</table>
<div class="form-group">
            <label for="text">Remarks</label>
            <input name="price" required placeholder="Enter Remarks" type="text" class="form-control" id="price"\
                >
        </div>
        <button style="float: right" type="submit" class="btn btn-primary">Submit</button>
      

</main>

@stop