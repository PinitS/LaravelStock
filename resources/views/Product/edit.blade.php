@extends('layout.mainlayout')

@section('page_title' , 'EditProduct')

@section('content')

    <form action = "{{ action('ProductController@update' , [$Product->id] )}}" method = "post">
        <input type="hidden" name = "_method" value = "PUT">
        <input type="hidden"  class="form-control" name = "id" id="id" value = "{{$Product->id}}" required="" >
        {{ csrf_field() }}

    <div class="row">
        <div class="col-md-4 order-md-1 container">

            <div class="row">

                <div class="col-md-6 mb-3">
                    <input type="radio" id="EX1" name="Checkfield" value="fieldName" onchange="my_function('fieldName')">
                    <label for="EX1">EditName</label><br>
                </div>

                <div class="col-md-6 mb-3">

                    <input type="radio" id="EX3" name="Checkfield" value="fieldQuantity"  onchange="my_function('fieldQuantity')" checked>
                    <label for="EX3">EditValue</label><br>

                </div>

            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-10 order-md-1= mt-1 pt-2 container">

            <div class="row">

                <div class="col-md-4 mb-3">
                    <input type="text"  class="form-control" name = "productName" id="productName" value = "{{$Product->productName}}" required="" disabled>
                </div>

                <div class="col-md-4 mb-3">
                    <select name="category_id" id="category_id" class="form-control" disabled>
                        @foreach($Categories as $Category)
                            <option
                                @if($Product->category_id == $Category->id) 
                                    selected="selected"
                                @endif    
                                                
                                value="{{$Category->id}}">{{$Category->categoryName}}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <input type="text"  class="form-control" name = "unit" id="unit" value = "{{$Product->unit}}" required="" disabled>
                </div>

            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-6 order-md-1 pt-2 container">

            <div class="row">

                <div class="col-md-3 mb-3 mt-1">
                    <input type="radio" id="Increase" name="Change" value="1"checked>
                    <label for="male">Increase</label><br>
                </div>

                <div class="col-md-3 mb-3 mt-1 ">
                    <input type="radio" id="decrease" name="Change" value="2" >
                    <label for="female">decrease</label><br>
                </div>

                <div class="col-md-6 mb-3">
                    <input type="text"  class="form-control" name = "InCreOrDes" id="InCreOrDes" onkeypress="return /[0-9]/i.test(event.key)"  required="" value = "0" required="">
                </div>

            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-4 order-md-1 container">
            <div class="row">
                <button type="submit" class="btn btn-primary btn-block my-2" value="Reproduct" id ="Reproduct" name="Reproduct">Submit</button>
            </div>
        </div>
    </div>


    </form>
    <script>
            function my_function(val)
            {
                if(val == "fieldName")
                {
                    document.getElementById("InCreOrDes").disabled = true;
                    document.getElementById("Increase").disabled = true;
                    document.getElementById("decrease").disabled = true;

                    document.getElementById("productName").disabled = false;
                    document.getElementById("category_id").disabled = false;
                    document.getElementById("unit").disabled = false;

                }
                else
                {
                    document.getElementById("InCreOrDes").disabled = false;
                    document.getElementById("Increase").disabled = false;
                    document.getElementById("decrease").disabled = false;

                    document.getElementById("productName").disabled = true;
                    document.getElementById("category_id").disabled = true;
                    document.getElementById("unit").disabled = true;

                }
            }
        </script>


@endsection








  
                


                                    
  






                                    











                




                    


                            




                



                
            









