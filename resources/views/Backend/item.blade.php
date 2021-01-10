@extends('backend.master')
@section('main')
<main class="app-content">

<h1>Add new Item</h1>

@if(session()->has('message'))
    <p class="alert alert-success">{{session()->get('message')}}</p>
@endif

@if($errors->any())
    @foreach($errors->all() as $er)
        <p class="alert alert-danger">{{$er}}</p>
    @endforeach
@endif


    <form action="{{route('item.create')}}"  method="post">
        @csrf
        <div .col-md-3 .offset-md-3 class="form-group">
            <label for="item_name">Enter Item Name</label>
            <input name="name" required placeholder="Enter item name" type="text" class="form-control" id="item_name">

        </div>
        <div class="form-group">
            <label for="text">Under Item Type</label>
            <select name="item_types_id" id="item_types_id" class="form-control">
                <option value="0">Select a Item Types</option>
                @foreach($itemtypeshow as $data)
                <option value="{{$data->id}}">{{$data->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="text">Code</label>
            <input name="code" required placeholder="code" type="text" class="form-control" id="text"
                >


        </div>
        <div class="form-group">
            <label for="price">Description</label>
            <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</main>

@stop