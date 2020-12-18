@extends('backend.master')
@section('main')
<main class="app-content">

<h1>Item Distributions</h1>

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

    <form action="{{#}}"  method="post">
        @csrf
        <div .col-md-3 .offset-md-3 class="form-group">
            <label for="item_id">Enter Item's Id</label>
            <input name="item_id" required placeholder="Enter Item Id" type="text" class="form-control" id="item_name" aria-describedby="emailHelp" autocomplete="off">

        </div>

        <div class="form-group">
            <label for="employee_id">Employees's Id</label>
            <input name="employee_id" required placeholder="Employees's Id" type="text" class="form-control" id="text"
                >
        </div>
         <div class="form-group">
            <label for="location">Location</label>
            <input name="location" required placeholder="location" type="text" class="form-control" id="text"
                >
        </div>

 <div class="form-group">
            <label for="remark">emark</label>
            <input name="remark" required placeholder="Remark" type="text" class="form-control" id="text"
                >
        </div>



        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</main>

@stop