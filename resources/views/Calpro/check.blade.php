

@extends('layout.mainlayout')

@section('page_title' , 'Models')

@section('content')



        @if(Session::has('message'))
            <div class="alert alert-success"> <h3 class="alert-heading"> {{Session::get('message')}} </h3> </div>
        @elseif(Session::has('error'))
            <div class="alert alert-danger"> <h3 class="alert-heading"> {{Session::get('error')}} </h3> </div>
        @elseif(Session::has('warning'))
            <div class="alert alert-warning"> <h3 class="alert-heading"> {{Session::get('warning')}} </h3> </div>
            
        @endif
        <div class="row">
            <div class="col-md-4 order-md-1 mb-3 container">
                <h3 style="color:#4d1919">Requirement Product</h3>
            </div>
        </div>

        <table class = "table">

            <thead class = "thead-dark">
                <tr>
                    <th scope = "col">Product</th>
                    <th scope = "col">Quatity</th>
                    <th scope = "col">Simulator</th>
                    <th scope = "col">requirement</th>
                </tr>
            </thead>

            <tbody>
                @foreach($check_sim as $sim)
                    <tr>
                        <td>{{$sim->product->productName}}</td>
                        <td>{{$sim->product->quantity}}</td>
                        <td>{{$sim->SIM}}</td>
                        @if($sim->SIM > $sim->product->quantity)
                        <td style="color:red">{{($sim->product->quantity)-($sim->SIM)}}</td>
                        @else
                        <td style="color:green">{{($sim->product->quantity)-($sim->SIM)}}</td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        
        </table>
        



@endsection