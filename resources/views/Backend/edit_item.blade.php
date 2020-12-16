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

    <form action="{{route('item.update',$items->id)}}"  method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div .col-md-3 .offset-md-3 class="form-group">
            <label for="items_name">Enter Item Name</label>
            <input name="name" required value="{{$items->name}}" type="text" class="form-control" id="name" aria-describedby="emailHelp" autocomplete="off">

        </div>

        <div class="form-group">
            <label for="text">Item Types Id</label>
            <input name="item_types_id" value="{{$items->item_types_id}}" type="text" class="form-control" id="item_types_id"\
                >
        </div>

        <div class="form-group">
            <label for="text">Code</label>
            <input name="code" value="{{$items->code}}" type="text" class="form-control" id="text"\
                >
        </div>
        <div class="form-group">
            <label for="price">Description</label>
            <textarea class="form-control" name="description" id="" cols="30" rows="10">{{$items->description}}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</main>

@stop