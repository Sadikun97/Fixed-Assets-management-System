@extends('backend.master')
@section('main')
<main class="app-content">

<h1>Add Items In Stock</h1>

<!-- message code in form -->

@if(session()->has('message'))
    <p class="alert alert-success">{{session()->get('message')}}</p>
@endif

@if($errors->any())
    @foreach($errors->all() as $er)
        <p class="alert alert-danger">{{$er}}</p>
    @endforeach
@endif


<!-- code for form -->

    <form action="{{route('add.stock')}}"  method="post">
        @csrf
        <div .col-md-3 .offset-md-3 class="form-group">
            <label for="item_id">Under Item's</label>
            <select name="item_id" id="item_id" class="form-control">
                <option value="0">Select a Item</option>
                @foreach($itemsshow as $data)
                <option value="{{$data->id}}">{{$data->name}}</option>
                @endforeach
            </select>
        </div>

        
         <div class="form-group">
            <label for="location">Quantity</label>
            <input name="location" required placeholder="location" type="string" class="form-control" id="location"
                >
        </div>

 



        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</main>

@stop