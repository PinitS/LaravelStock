

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

        <table class = "table">

            <thead class = "thead-dark">
                <tr>
                    <th scope = "col">Serial</th>
                    <th scope = "col">Customer</th>
                    <th scope = "col">province</th>
                    <th scope = "col">Address</th>
                    <th scope = "col">Date</th>
                    <th scope = "col">Map</th>
                    <th scope = "col">Edit</th>
                    <th scope = "col">Delete</th>
                </tr>
            </thead>

            <tbody>

            @foreach($ShowBroads as $Show)
                <tr>
                
                    <td> {{$Show->serialbroad}} </td>
                    <td> {{$Show->customername}} </td>
                    <td> {{$Show->province->name_th}} </td>
                    <td> {{$Show->address}} </td>
                    <td> {{$Show->setupdate}} </td>
                    <td> <A href='http://{{$Show->map}}' target="_blank">{{$Show->map}}</A></td>

                    <td>
                        <a href="{{ action('BroadlocatController@edit', [$Show->id]) }}">
                                <button type = "button" class = "btn btn-warning">Edit</button>
                        </a>  
                    </td>

                    <td> 
                        <a href="{{ route('Broadlocat.customdelete', ['Bid'=> $Show->id]) }}">
                            <button type = "button" class = "btn btn-danger">Delete</button>
                        </a> 
                    </td>

                </tr>
            @endforeach


            </tbody>
        
        </table>
        

</form>

@endsection