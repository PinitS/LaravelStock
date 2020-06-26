
@extends('layout.mainlayout')

@section('page_title' , 'Edit')

@section('content')


        <hr>
        <form action = "{{ action('CategoryController@update' , [$Category->id] )}}" method = "post">
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
                                <input type="hidden"  class="form-control" name = "id" id="id" value = "{{$Category->id}}" required="">
                                <div class = "my-2">
                                    <input type="text"  class="form-control" name = "categoryName" id="categoryName" value = "{{$Category->categoryName}}" required="">
                                </div>
                            </td>
                            
                            <td>
                                <div class = "my-2">
                                    <input type="text"  class="form-control" name = "description" id="description" value = "{{$Category->description}}" required="">
                                </div>
                            </td>

                            <td>
                                <button type="submit" class="btn btn-primary btn-block my-2" value="ReCategory" id ="ReCategory" name="ReCategory">Submit</button>
                            </td>

                        </tr>

                </tbody>
        
            </table>

        </form>

@endsection