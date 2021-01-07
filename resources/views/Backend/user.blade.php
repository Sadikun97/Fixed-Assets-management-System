@extends('backend.master')
@section('main')
<main class="app-content">

<h1>Add New User</h1>

	@if(session()->has('message'))
    <p class="alert alert-success">{{session()->get('message')}}</p>
@endif

@if($errors->any())
    @foreach($errors->all() as $er)
        <p class="alert alert-danger">{{$er}}</p>
    @endforeach
@endif

    <form action="{{route('add.user')}}"  method="post" enctype="multipart/form-data">
        @csrf
        <div .col-md-3 .offset-md-3 class="form-group">
            <label for="user_name">User Name</label>
            <input name="name" required placeholder="Enter User name" type="text" class="form-control" id="text" aria-describedby="emailHelp" autocomplete="off">

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
            <label for="email">Password</label>
            <input name="password" required placeholder="Password" type="text" class="form-control" id="text"
                >
        </div>

         
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</main>

@stop