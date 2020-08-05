
@extends('layout.mainlayout')

@section('page_title' , 'Edit')

@section('content')


        <hr>
        <form action = "{{ action('BroadlocatController@update' , [$editvalue->id] )}}" method = "post">
            <input type="hidden" name = "_method" value = "PUT">
            <input type="hidden"  class="form-control" name = "Bid" id="Bid" value = "{{$editvalue->id}}">
            {{ csrf_field() }}

            <div class="row">

                <div class="col-md-4 mb-3 text-center">
                    <label for="serial_broad">Serial Broad</label>
                    <input type="text" name = "serial_broad" class="form-control" id="serial_broad" value = "{{$editvalue->serialbroad}}" required="">
                </div>

                <div class="col-md-4 mb-3 text-center">
                    <label for="customer_name">Customer Name</label>
                    <input type="text" name = "customer_name" class="form-control" id="customer_name" placeholder="Customer Name" value = "{{$editvalue->customername}}" required="">
                </div>

                <div class="col-md-4 mb-3 text-center">
                    <label for="Date">Date Setup</label>
                    <input type="text" name = "date" class="form-control" id="date" placeholder="date" value = "{{$editvalue->setupdate}}" required="">
                </div>

             </div>

            <div class="row">
                <div class="col-md-2 mb-3 text-center">
                    <label for="province">Province</label>
                    <!-- <input type="text" name = "province" class="form-control" id="province" placeholder="province" required=""> -->
                    <select class="custom-select d-block w-100" name="province" id="province">
                        <option value="0"> ==ALL Province== </option>

                            @foreach($Provinces as $Province)
                                @if($Province->id == $editvalue->province_id)
                                    <option selected value="{{$Province->id}}">{{$Province->name_th}}</option>
                                @else
                                    <option value="{{$Province->id}}">{{$Province->name_th}}</option>
                                @endif
                            @endforeach
                    </select>
                </div>

                <div class="col-md-4 mb-3 text-center">
                    <label for="province">Address</label>
                    <input type="text" name = "address" class="form-control" id="address" placeholder="address" value = "{{$editvalue->address}}" required="">
                </div>

                <div class="col-md-6 mb-3 text-center">
                    <label for="maplink">maplink</label>
                    <input type="text" name = "maplink" class="form-control" id="maplink" placeholder="maplink" value = "{{$editvalue->map}}" required=""> 
                </div>

            </div>

            <div class="row">
                <div class="col-md-3 mb-3 text-center container">
                    <button type="submit" class="btn btn btn-warning btn-block my-2" value="Edit" id ="Edit" name="Edit">Edit</button>
                </div>
            </div>

        </form>

@endsection