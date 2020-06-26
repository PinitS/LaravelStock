
@extends('layout.mainlayout')

@section('page_title' , 'INDEX')

@section('content')

<?php 
    $chk = '';
    $dis = '';

    if($checked == 1)
    {
        $chk = 'checked';
        $dis = 'disabled';
    }
?>    

<form action="/report" method ="get">
{{ csrf_field() }}
    <div class="row">
        <div class="col-md-4 order-md-1 container">

            <div class="row">

                <div class="col-md-2 mb-3">

                    <label for="checkbox">ปี</label>

                    <input type="checkbox" class="form-control" id="checkbox" name =  "checkbox" value="1"  {{$chk}}/> 
                </div>

                <div class="col-md-3 mb-3">
                    <label for="month">เดือน</label>
                    <input type="text"  class="form-control" name = "month" id="month"  onkeypress="return /[0-9]/i.test(event.key)" {{$dis}} value="{{$mount}}"> 
                </div>


                <div class="col-md-3 mb-3">
                    <label for="month">ปี ค.ศ.</label>
                    <input type="text"  class="form-control" name = "year" id="year" onkeypress="return /[0-9]/i.test(event.key)" value="{{$year}}">
                </div>

                <div class="col-md-4 mb-3 mt-4 pt-2">
                    <button type="submit" class="btn btn-primary btn-block">Search</button>
                </div>

            </div>
            
        </div>
    </div>

</form>

    <table class = "table">
        <thead >

            <tr>

                <th scope = "col">ProductNAME</th>
                <th scope = "col">CategoryNAME</th>
                <th scope = "col">TypeNAME</th>
                <th scope = "col">Date</th>
                <th scope = "col">InCreOrDes</th>
                <th scope = "col">ReportQuantity</th>

                
            </tr>

        </thead>

        <tbody>

            @foreach($reports as $report)

                <tr>
    
                    <td>{{$report->product->productName}}</td>
                    <td>{{$report->category->categoryName}}</td>
                    <td>{{$report->type_id}}</td>
                    <td>{{date('d-m-Y', strtotime($report->created_at))}}</td>
                    <td>{{$report->inCreOrDes}}</td>
                    <td>{{$report->reportQuantity}}</td>

                </tr>

            @endforeach


        </tbody>
    
    </table>

<script>
        document.getElementById('checkbox').onchange = function() 
        {
            document.getElementById('month').disabled = this.checked;
        };
</script>


@endsection

