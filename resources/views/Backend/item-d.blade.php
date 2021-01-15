@extends('backend.master')
@section('main')
<main class="app-content">

<h1>Distribute Item</h1>

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

    <form action="{{route('itemd.create')}}"  method="post">
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
            <label for="item_id">Under Employee's</label>
            <select name="employee_id" id="employee_id" class="form-control">
                <option value="0">Select a Employee Name</option>
                @foreach($itemdshoww as $data)
                <option value="{{$data->id}}">{{$data->name}}</option>
                @endforeach
            </select>
        </div>
         <div class="form-group">
            <label for="location">Location</label>
            <input name="location" required placeholder="Location" type="text" class="form-control" id="text"
                >
        </div>


        <div class="form-group">
            <label for="location">Quantity</label>
            <input name="quantity" min="1" required placeholder="Quantity" type="number" class="form-control" id="quantity"
                >
        </div>
 <div class="form-group">
            <label for="remark">Remark</label>
            <input name="remark" required placeholder="Remark" type="text" class="form-control" id="text"
                >
        </div>



        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</main>

@stop