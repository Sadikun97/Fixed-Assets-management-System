@extends('backend.master')
@section('main')
<main class="app-content">

<h1>Add new product</h1>
    <form action="{{route('purchases')}}"  method="post">
        @csrf
        <div .col-md-3 .offset-md-3 class="form-group">
            <label for="product_name">Created By</label>
            <input name="created_by" required placeholder="Created By" type="text" class="form-control" id="created_by" aria-describedby="emailHelp" autocomplete="off">

        </div>
        <div class="form-group">
            <label for="text">Total Amount</label>
            <input name="total_amount" required placeholder="Enter Amount" type="text" class="form-control" id="total_amount"\
                >
        </div>
        <div class="form-group">
            <label for="price">Remark</label>
            <textarea class="form-control" name="remark" id="remark" cols="30" rows="10"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</main>

@stop