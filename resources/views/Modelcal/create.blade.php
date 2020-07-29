

@extends('layout.mainlayout')

@section('page_title' , 'Models')

@section('content')


<form action="/Modelcal" method ="post">

    {{ csrf_field() }}

        @if(Session::has('message'))
            <div class="alert alert-success"> <h3 class="alert-heading"> {{Session::get('message')}} </h3> </div>
        @elseif(Session::has('error'))
            <div class="alert alert-danger"> <h3 class="alert-heading"> {{Session::get('error')}} </h3> </div>
        @elseif(Session::has('warning'))
            <div class="alert alert-warning"> <h3 class="alert-heading"> {{Session::get('warning')}} </h3> </div>
            
        @endif

        <div class = "row">

        <input type="text"  class="form-control" name = "modelname" id="modelname" placeholder="Add Model" required="">

        <button type="submit" class="btn btn-primary btn-block my-2" value="AddModel" id ="AddModel" name="AddModel">AddModel</button>
        
        </div>

        <table class = "table">
            <thead class = "thead-dark">

                <tr>
                    <th scope = "col">ModelName</th>
                    <th scope = "col">Action</th>
                </tr>

            </thead>

            <tbody>

            

            </tbody>
        
        </table>
        

</form>

@endsection