

@extends('layout.mainlayout')

@section('page_title' , 'Models')

@section('content')


<form action="/Modellocat" method ="post">

    {{ csrf_field() }}

        @if(Session::has('message'))
            <div class="alert alert-success"> <h3 class="alert-heading"> {{Session::get('message')}} </h3> </div>
        @elseif(Session::has('error'))
            <div class="alert alert-danger"> <h3 class="alert-heading"> {{Session::get('error')}} </h3> </div>
        @elseif(Session::has('warning'))
            <div class="alert alert-warning"> <h3 class="alert-heading"> {{Session::get('warning')}} </h3> </div>
            
        @endif

        <div class = "row">

            <div class="col-md-9 mb-3 my-2">
                <input type="text"  class="form-control" name = "modelname" id="modelname" placeholder="Add Model" required="">
            </div>

            <div class="col-md-3 mb-3">
                <button type="submit" class="btn btn-info btn-block my-2" value="AddModel" id ="AddModel" name="AddModel">AddModel</button>
            </div>

        </div>

        <table class = "table">

            <thead class = "thead-dark">
                <tr>
                    <th scope = "col">ModelName</th>
                    <th scope = "col">Sum</th>
                </tr>
            </thead>

            <tbody>

            @foreach($Modellocate as $Model)
                <tr>
                
                    <td> <a href="{{ action('ModellocatController@show', [$Model->id]) }}">{{$Model->modellocatname}} </a> </td>
                    <td> {{$Model->broadlocat_count}} </td>

                </tr>
            @endforeach


            </tbody>
        
        </table>
        

</form>

@endsection