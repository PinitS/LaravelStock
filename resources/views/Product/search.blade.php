

@extends('layout.mainlayout')

@section('page_title' , 'Search')

@section('content')



    <!-- ไอเดียผ่านค่า สติง มาจาก controller เอามาใช้ในคลาส เขียน ทีเดียวใช้ได้ทุกแบบ -->

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

                <tr>
                    <div class="row">
                        <form action="/search" method ="get">
                            <div class="col-md-9 mb-3 text-center">
                            
                                <input type="text" class="form-control" name="SearchProductName" id="SearchProductName">
                            </div>

                            <div class="col-md-3 mb-8 my-9 text-center">
                                <button type="submit" class="btn btn-primary btn-block">Search</button>
                            </div>
                        </form>
                    </div>
                </tr>
                
                @foreach($Products as $Product)

                <tr>

                    <td>{{$Product->productName}}</td>
                    <td>{{$Product->category->categoryName}}</td>
                    <td>{{$Product->unit}}</td>
                    <td>{{$Product->quantity}}</td>


                    <td>
                        <a href="{{ action('ProductController@edit', [$Product->id]) }}">
                            <button type = "button" class = "btn btn-warning">Edit</button>
                        </a>
                    </td>

                </tr>

                @endforeach


            </tbody>
        
        </table>

@endsection