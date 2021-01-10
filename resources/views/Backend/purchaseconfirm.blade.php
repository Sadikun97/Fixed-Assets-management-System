@extends('backend.master')
@section('main')
<main class="app-content">

<h1>Confirm Purchase</h1>

@if(session()->has('message'))
    <p class="alert alert-success">{{session()->get('message')}}</p>
@endif

@if($errors->any())
    @foreach($errors->all() as $er)
        <p class="alert alert-danger">{{$er}}</p>
    @endforeach
@endif

    <form action="purchases.confirm"  method="post">
        @csrf
        <div .col-md-3 .offset-md-3 class="form-group">
            <label for="total">Enter Total</label>
            <input name="total" required placeholder="Enter Total" type="text" class="form-control" id="total" aria-describedby="emailHelp" autocomplete="off">

        </div>

        <div class="form-group">
            <label for="text">Date</label>
            <input name="date" required placeholder="Date" type="date" class="form-control" id="date"
                >
        </div>
        <div class="form-group">
            <label for="text">Purchase By</label>
            <input name="purchase_by" required placeholder="Purchase By" type="text" class="form-control" id="purchase_by"
                >
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</main>

@stop