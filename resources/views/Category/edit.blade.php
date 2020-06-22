
@extends('layout.mainlayout')

@section('page_title' , 'Edit')

@section('content')

<div class = "container mt-5 pt-5 text-center">
        <hr>
        <form action = "{{ action('CategoryController@update' , [$Category->CategoryID] )}}" method = "post">
            <input type="hidden" name = "_method" value = "PUT">
            {{ csrf_field() }}

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
                                <input type="hidden"  class="form-control" name = "CategoryID" id="CategoryID" value = "{{$Category->CategoryID}}" required="">
                                <div class = "my-2">
                                    <input type="text"  class="form-control" name = "CategoryName" id="CategoryName" value = "{{$Category->CategoryName}}" required="">
                                </div>
                            </td>
                            
                            <td>
                                <div class = "my-2">
                                    <input type="text"  class="form-control" name = "Description" id="Description" value = "{{$Category->Description}}" required="">
                                </div>
                            </td>

                            <td>
                                <button type="submit" class="btn btn-primary btn-block my-2" value="ReCategory" id ="ReCategory" name="ReCategory">Submit</button>
                            </td>

                        </tr>

                </tbody>
        
            </table>

        </form>
</div>
@endsection