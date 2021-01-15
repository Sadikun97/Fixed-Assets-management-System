@extends('backend.master')
@section('main')
<main class="app-content">

<h1>Add new Item Type</h1>

@if(session()->has('message'))
    <p class="alert alert-success">{{session()->get('message')}}</p>
@endif

@if($errors->any())
    @foreach($errors->all() as $er)
        <p class="alert alert-danger">{{$er}}</p>
    @endforeach
@endif

    <form action="{{route('it.update',$item_types->id)}}"  method="post">
    	@method('put')
        @csrf
        <div .col-md-3 .offset-md-3 class="form-group">
            <label for="item_types_name">Enter Item Types Name</label>
            <input name="name" required value="{{$item_types->name}}" type="text" class="form-control" id="name" aria-describedby="emailHelp" >

        </div>

        

        <div class="form-group">
            <label for="text">Description</label>
            <input name="description" required value="{{$item_types->description}}" type="text" class="form-control" id="text"
                >
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</main>

@stop

