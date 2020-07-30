
@extends('layout.mainlayout')

@section('page_title' , 'Edit')

@section('content')


        <hr>
        <form action = "{{ action('CalproController@update' , [$edit_id->product_id] )}}" method = "post">
            <input type="hidden" name = "_method" value = "PUT">
            <input type="hidden"  class="form-control" name = "Mid" id="Mid" value = "{{$Model_id->id}}">
            <input type="hidden"  class="form-control" name = "Pid" id="Pid" value = "{{$edit_id->product_id}}">
            {{ csrf_field() }}

            <div class="py-4 text-center">
                <h3 style="color:#4d1919" >Model : {{$Model_id->modelName}}</h3>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3 my-2 text-center">
                    <label for="Productname">Product Name</label>
                    <input type="text" name = "Model" class="form-control" id="Productname" disabled value = "{{$edit_id->product->productName}}">
                </div>

            <div class="col-md-4 mb-3 my-2 text-center">
                <label for="Quantity">Quantity</label>
                <input type="text" name = "newQuantity" id="newQuantity" class="form-control" value = "{{$edit_id->calquantity}}" onkeypress="return /[0-9]/i.test(event.key)" >
            </div>

            <div class="col-md-4 mb-3 text-center">
                <label for="submit"></label>
                    <button type="submit" class="btn btn-warning btn-block my-3" value="Update" id ="Update" name="Update">Update</button>
                </div>
            </div>

        </form>

@endsection