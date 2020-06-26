

@extends('layout.mainlayout')

@section('page_title' , 'CreateProducts')

@section('content')


<form action="/Product" method ="post">

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
                    <th scope = "col">CategoryName</th>
                    <th scope = "col">ProductName</th>
                    <th scope = "col">Type</th>
                    <th scope = "col">Quantity</th>
                    <th scope = "col">Action</th>
                </tr>

            </thead>

            <tbody>
            <div class="row">
                    <tr>
                        <td>
                            <div class = "my-2">
                                <select name="category_id" id="category_id" class="form-control">
                                        <option value="0">==All Categories==</option>
                                        @foreach($Categories as $Category)
                                            <option value="{{$Category->id}}">{{$Category->categoryName}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </td>

                        <td>
                            <div class = "my-2">
                                <input type="text"  class="form-control" name = "productName" id="productName" placeholder="ชื่อสินค้า" required="">
                            </div>
                        </td>
                        
                        <td>
                            <div class = "my-2">
                                <input type="text"  class="form-control" name = "unit" id="unit" placeholder="รายละเอียดต่างๆ" value="-">
                            </div>
                        </td>

                        <td>
                            <div class = "my-2">
                                <input type="text"  class="form-control" name = "quantity" id="quantity" onkeypress="return /[0-9]/i.test(event.key)" value = "" required="">
                            </div>
                        </td>

                       
                        <td>
                            <button type="submit" class="btn btn-primary btn-block my-2" value="AddProduct" id ="AddProduct" name="AddCategory">Add</button>
                        </td>

                    </tr>
                </div>
            </tbody>
        
        </table>
        

</form>

@endsection