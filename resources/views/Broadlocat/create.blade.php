

@extends('layout.mainlayout')

@section('page_title' , 'Models')

@section('content')


<form action="/Broadlocat" method ="post">

    {{ csrf_field() }}

        @if(Session::has('message'))
            <div class="alert alert-success"> <h3 class="alert-heading"> {{Session::get('message')}} </h3> </div>
        @elseif(Session::has('error'))
            <div class="alert alert-danger"> <h3 class="alert-heading"> {{Session::get('error')}} </h3> </div>
        @elseif(Session::has('warning'))
            <div class="alert alert-warning"> <h3 class="alert-heading"> {{Session::get('warning')}} </h3> </div>
            
        @endif

        <div class="row">

          <div class="col-md-2 mb-3 text-center">
            <label for="model_id">Model Name</label>
              <select class="custom-select d-block w-100" name="model_id" id="model_id">
                  <option value="0"> ==ALL Models== </option>
                @foreach($Modellocate as $Model)
                    <option value="{{$Model->id}}">{{$Model->modellocatname}}</option>
                @endforeach

              </select>
          </div>

          <div class="col-md-3 mb-3 text-center">
            <label for="serial_broad">Serial Broad</label>
            <input type="text" name = "serial_broad" class="form-control" id="serial_broad" placeholder="Serial Broad" required="">
          </div>

          <div class="col-md-4 mb-3 text-center">
            <label for="customer_name">Customer Name</label>
            <input type="text" name = "customer_name" class="form-control" id="customer_name" placeholder="Customer Name" required="">
          </div>

          <div class="col-md-3 mb-3 text-center">
            <label for="Date">Date Setup</label>
            <input type="text" name = "date" class="form-control" id="date" placeholder="date" required="">
          </div>

        </div>

        <div class="row">
            <div class="col-md-4 mb-3 text-center">
                <label for="province">Province</label>
                <!-- <input type="text" name = "province" class="form-control" id="province" placeholder="province" required=""> -->
                <select class="custom-select d-block w-100" name="province" id="province">
                    <option value="0"> ==ALL Province== </option>
                    @foreach($Provinces as $Province)
                      <option value="{{$Province->id}}">{{$Province->name_th}}</option>
                    @endforeach

                </select>
            </div>

            <div class="col-md-8 mb-3 text-center">
                <label for="province">Address</label>
                <input type="text" name = "address" class="form-control" id="address" placeholder="address" required="">
            </div>

        </div>

        <div class="row">
            <div class="col-md-12 mb-3 text-center">
                <label for="maplink">maplink</label>
                <input type="text" name = "maplink" class="form-control" id="maplink" placeholder="maplink" required="">
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 mb-3 text-center container">
                <button type="submit" class="btn btn-info btn-block my-2" value="AddBroad" id ="AddBroad" name="AddBroad">AddBroad</button>
            </div>
        </div>

</form>

@endsection