@extends('backend.master')
@section('main')
<main class="app-content">
<h1>Add new product</h1>
    <form action="{{route('purchases.create')}}"  method="post">
        @csrf
        
        <div  class="form-group">
            <label for="items_id">Under Item's</label>
            <select name="items_id" id="items_id" class="form-control">
                <option value="0">Select a Item</option>

                @foreach($items  as $data)
                <option value="{{$data->id}}">{{$data->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="text">Quantity</label>
            <input name="quantity"min="1" required placeholder="Enter Quantity" type="number" class="form-control" id="quantity">
        </div>

        <div class="form-group">
            <label for="text">Price</label>
            <input name="price"min="1" required placeholder="Enter Price" type="number" class="form-control" id="price">
        </div>
        
        <button style="float: right" type="submit" class="btn btn-primary">Add to cart</button>
    </form>

    <div>
      <div class="table-resonsive">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Item's Name </th>
      <th scope="col">Quantity</th>
      <th scope="col">Unit Price</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
  <tbody>
@if(session('cart'))
    @foreach(session('cart') as $key=>$data)

    <tr>
      <th> {{1}}</th>
      <td>{{$data['name'] ?? ''}}</td>
      <td>{{$data['quantity']}}</td>
      <td>{{$data['price']}}</td>
      <td>{{$data['total']}}</td>

    </tr>
    @endforeach
    @endif

   
</tbody>



</table>

<form action="{{route('submit.purchase')}}" method="post">
@csrf
<div class="form-group">
            <label for="text">Remark</label>
            <input name="remarks" placeholder="Enter Remark" type="text" class="form-control" id="remarks">
        </div>
        <div class="form-group">
            <label for="text">Purchased By</label>
            <input name="purchase_by" placeholder="Purchased By" type="text" class="form-control" id="purchase_by">
        </div>
        <button style="float: right;margin-left: 10px;" type="submit" class="btn btn-primary">Submit</button>
      
        <a href="{{route('cart.clear')}}" style="float: right" type="submit" class="btn btn-primary">Cart Clear</a>
        </form>
</main>

@stop