@extends('backend.master')
@section('main')
<main class="app-content">

<h1>Add Item in Damage</h1>

@if(session()->has('message'))
    <p class="alert alert-success">{{session()->get('message')}}</p>
@endif

@if($errors->any())
    @foreach($errors->all() as $er)
        <p class="alert alert-danger">{{$er}}</p>
    @endforeach
@endif


    <form action="{{route('damage.create')}}"  method="post">
        @csrf

        <input type="hidden" name="disId" value="{{$disId}}">
        <div .col-md-3 .offset-md-3 class="form-group">
            <label for="reason">Reason</label>
            <input name="reason" required placeholder="Reason" type="text" class="form-control" id="reason" aria-describedby="emailHelp" autocomplete="off">

        </div>

        <div .col-md-3 .offset-md-3 class="form-group">
            <label for="is_responsible">Is Responsible</label>
            <input name="is_responsible" required placeholder="is responsible" type="text" class="form-control" id="is_responsible" aria-describedby="emailHelp" autocomplete="off">

        </div>

        <!-- <div class="form-group">
            <label for="text">Under Item Type</label>
            <select name="is_responsible" id="is_responsible" class="form-control">
                <option value="0">Is Responsible</option>
                
                <option value=""></option>
                \
            </select>
        </div> -->

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</main>

@stop