
@extends('layout.mainlayout')

@section('page_title' , 'CreateCategory')

@section('content')


<form action="{{ action('CategoryController@index')}}" method ="post">
    {{ csrf_field() }}



        @if(Session::has('message'))
            <div class="alert alert-info">{{Session::get('message')}}</div>
        @endif

        <table class = "table">
            <thead class = "thead-dark">

                <tr>
                    <th scope = "col">CategoryName</th>
                    <th scope = "col">Description</th>
                    <th scope = "col">Action</th>
                </tr>

            </thead>

            <tbody>
                    <tr>
                        <td>
                            <div class = "my-2">
                                <input type="text"  class="form-control" name = "Category" id="Category" placeholder="ชื่อหมวดหมู่ที่ต้องการเพิ่ม" required="">
                            </div>
                        </td>
                        
                        <td>
                            <div class = "my-2">
                                <input type="text"  class="form-control" name = "Description" id="Description" placeholder="รายละเอียดต่างๆ(ใส่หรือไม่ใส่ก็ได้)" value ="-">
                            </div>
                        </td>

                        <td>
                            <button type="submit" class="btn btn-primary btn-block my-2" value="AddCategory" id ="AddCategory" name="AddCategory">Add</button>
                        </td>

                    </tr>

            </tbody>
        
        </table>
        

</form>

@endsection