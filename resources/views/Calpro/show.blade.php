

@extends('layout.mainlayout')

@section('page_title' , 'Models')

@section('content')


<form action="/Calpro" method ="post">

    {{ csrf_field() }}

        @if(Session::has('message'))
            <div class="alert alert-success"> <h3 class="alert-heading"> {{Session::get('message')}} </h3> </div>
        @elseif(Session::has('error'))
            <div class="alert alert-danger"> <h3 class="alert-heading"> {{Session::get('error')}} </h3> </div>
        @elseif(Session::has('warning'))
            <div class="alert alert-warning"> <h3 class="alert-heading"> {{Session::get('warning')}} </h3> </div>
            
        @endif
        <input type="hidden"  class="form-control" name = "id" id="id" value = "{{$Model_id->id}}">


        <div class="row">
            <div class="col-md-4 order-md-1 mb-3 container">
                <h3 style="color:#4d1919">Model : {{$Model_id->modelName}}</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 order-md-1 mb-3 container">
                <h5 style="color:#663399">Simulator : {{$SimCal->simcal}}</h5>
            </div>
        </div>



        <div class = "row">

            <div class="col-md-4 mb-3 my-2">
                <select name="pro_id" id="pro_id" class="form-control">
                    <option value="0">==All Product==</option>
                        @foreach($Product as $Pro)
                            <option value="{{$Pro->id}}">{{$Pro->productName}}</option>
                        @endforeach
                </select>
            </div>

            <div class="col-md-4 mb-3 my-2">
                <input type="text"  class="form-control" name = "quantity" id="quantity" onkeypress="return /[0-9]/i.test(event.key)" value = "0" required="">
            </div>
           
            <div class="col-md-4 mb-3">
                <button type="submit" class="btn btn-primary btn-block my-2" value="AddIN" id ="submit" name="submit">Add IN Model</button>
            </div>

        </div>
        <hr>

        <div class="row">
            <div class="col-md-4 order-md-1 container">

                <div class="row">
                  <div class="col-md-6 mb-3 my-2 text-center">
                      <input type="text" name = "SimCal" id="SimCal" value="0" class="form-control"  onkeypress="return /[0-9]/i.test(event.key)"   >
                  </div>

                  <div class="col-md-6 mb-3 text-center">
                    <button type="submit" class="btn btn-warning btn-block my-2" value="Simulator" id ="submit" name="submit">Simulator</button>
                  </div>
                </div>
            </div>
        </div>



        <table class = "table">

            <thead class = "thead-dark">
                <tr>
                    <th scope = "col">Product</th>
                    <th scope = "col">Quatity</th>
                    <th scope = "col">Edit</th>
                    <th scope = "col">Delete</th>
                    <th scope = "col">Sum</th>
                </tr>
            </thead>

            <tbody>
                @foreach($Calpro as $Cal)
                    <tr>
                        <td>{{$Cal->product->productName}}</td>
                        <td>{{$Cal->calquantity}}</td>

                        <td>    
                            <a href="{{ route('Calpro.customedit', ['Pid' => $Cal->product_id ,'Mid'=> $Model_id->id]) }}">
                                <button type = "button" class = "btn btn-warning">Edit</button>
                            </a>
                        </td>

                        <td>    
                            <a href="{{ route('Calpro.customdelete', ['Pid' => $Cal->product_id ,'Mid'=> $Model_id->id]) }}">
                                <button type = "button" class = "btn btn-danger">Delete</button>
                            </a>
                        </td>

                        <td>{{$Cal->sumquantity}}</td>
                    </tr>
                @endforeach
            </tbody>
        
        </table>
        

</form>

@endsection