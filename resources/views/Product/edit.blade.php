@extends('layout.mainlayout')

@section('page_title' , 'EditProduct')

@section('content')

    <form action = "{{ action('ProductController@update' , [$Product->ProductID] )}}" method = "post">
        <input type="hidden" name = "_method" value = "PUT">
        <input type="hidden"  class="form-control" name = "ProductID" id="ProductID" value = "{{$Product->ProductID}}" required="" >
        {{ csrf_field() }}


    <div class="row">
        <div class="col-md-4 order-md-1 container">

            <div class="row">

                <div class="col-md-6 mb-3">
                    <input type="radio" id="EX1" name="Checkfill" value="fillName" onchange="my_function('fillName')">
                    <label for="EX1">EditName</label><br>
                </div>

                <div class="col-md-6 mb-3">

                    <input type="radio" id="EX3" name="Checkfill" value="fillQuantity"  onchange="my_function('fillQuantity')" checked>
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
                    <input type="text"  class="form-control" name = "ProductName" id="ProductName" value = "{{$Product->ProductName}}" required="" disabled>
                </div>

                <div class="col-md-4 mb-3">
                    <select name="CategoryID" id="CategoryID" class="form-control" disabled>
                        @foreach($Categories as $Category)
                            <option
                                @if($Product->CategoryID == $Category->CategoryID) 
                                    selected="selected"
                                @endif    
                                                
                                value="{{$Category->CategoryID}}">{{$Category->CategoryName}}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <input type="text"  class="form-control" name = "Unit" id="Unit" value = "{{$Product->Unit}}" required="" disabled>
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
                if(val == "fillName")
                {
                    document.getElementById("InCreOrDes").disabled = true;
                    document.getElementById("Increase").disabled = true;
                    document.getElementById("decrease").disabled = true;

                    document.getElementById("ProductName").disabled = false;
                    document.getElementById("CategoryID").disabled = false;
                    document.getElementById("Unit").disabled = false;

                }
                else
                {
                    document.getElementById("InCreOrDes").disabled = false;
                    document.getElementById("Increase").disabled = false;
                    document.getElementById("decrease").disabled = false;

                    document.getElementById("ProductName").disabled = true;
                    document.getElementById("CategoryID").disabled = true;
                    document.getElementById("Unit").disabled = true;

                }
            }
        </script>


@endsection








  
                


                                    
  






                                    











                




                    


                            




                



                
            









