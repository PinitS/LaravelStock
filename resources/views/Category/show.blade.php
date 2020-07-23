
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
                <th scope = "col">ProductName</th>
                <th scope = "col">CategoryName</th>
                <th scope = "col">Type</th>
                <th scope = "col">Unit</th>
                <th scope = "col">Action</th>
            </tr>

        </thead>

        <tbody>

            @foreach($ProductCategory as $ProductCat)
                <tr>
                        
                    <td>{{$ProductCat->productName}}</td>

                    <td>{{$ProductCat->category->categoryName}}</td>

                    <td>{{$ProductCat->unit}}</td>

                    <td>{{$ProductCat->quantity}}</td>

                    <td>
                        <a href="{{ action('ProductController@edit', [$ProductCat->id]) }}">
                            <button type = "button" class = "btn btn-warning">Edit</button>
                        </a>
                    </td>
                        
                </tr>
            @endforeach

        </tbody>
    
    </table>
    


@endsection