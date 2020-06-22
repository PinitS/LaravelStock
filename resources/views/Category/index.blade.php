
@extends('layout.mainlayout')

@section('page_title' , 'INDEX')

@section('content')



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
                <th scope = "col">CategoryName</th>
                <th scope = "col">Description</th>
                <th scope = "col">Count</th>
                <th scope = "col">Action</th>
            </tr>

        </thead>

        <tbody>
        
            @foreach($Categories as $Category)

                <tr>
                    
                    <td><a href="{{ action('CategoryController@show', [$Category->CategoryID]) }}">{{$Category->CategoryName}}</a></td>

                    <td>{{$Category->Description}}</td>

                    <td>{{$Category->CountCat}}</td>

                    <td>
                        <a href="{{ action('CategoryController@edit', [$Category->CategoryID]) }}">
                                <button type = "button" class = "btn btn-warning">Edit</button>
                        </a>
                    </td>

                </tr>

            @endforeach


        </tbody>
    
    </table>
    


@endsection