@extends('backend.master')
@section('main')
<main class="app-content">

<h1>Add Employee</h1>

	@if(session()->has('message'))
    <p class="alert alert-success">{{session()->get('message')}}</p>
@endif

@if($errors->any())
    @foreach($errors->all() as $er)
        <p class="alert alert-danger">{{$er}}</p>
    @endforeach
@endif

    <form action="{{route('add.employee')}}"  method="post" enctype="multipart/form-data">
        @csrf
        <div .col-md-3 .offset-md-3 class="form-group">
            <label for="employee_name">Emloyee Name</label>
            <input name="name" required placeholder="Enter Emloyee name" type="text" class="form-control" id="text" aria-describedby="emailHelp" autocomplete="off">

        </div>


        <div class="form-group">
            <label for="text">Address</label>
            <input name="address" required placeholder="Address" type="text" class="form-control" id="text"
                >
        </div>

         <div class="form-group">
            <label for="email">Contact</label>
            <input name="contact" required placeholder="contact" type="text" class="form-control" id="text"
                >
        </div>

         <div class="form-group">
            <label for="email">Email</label>
            <input name="email" required placeholder="Email" type="text" class="form-control" id="text"
                >
        </div>


       <div class="form-group">
        <img id="image" src="#" />
         <label for="exampleInputPassword1">Image</label>
        <input type="file" name="image" accept="image/*" class="upload" required onchange="readURL(this);">
        </div>

         

         

         <div class="form-group">
            <label for="designation">Designation</label>
            <input name="designation" required placeholder="Designation" type="text" class="form-control" id="text"
                >
        </div>


         
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</main>

@stop