
<?Php

    $ChartMaxiData = '';
    $ChartMiniData = '';
    $ChartCatData = '';
    $colorChartMaxi = ['#122E33' , '#1A434A' , '#15373D' , '#307C8A' , '#47B6C9'];
    $colorChartMini = ['#472327' , '#6E363B' , '#612F34' , '#AD555E' , '#ED7480'];
    $cntChartMaxi = 0;
    $cntChartMini = 0;


    foreach($ChartMaxis as $ChartMaxi)
    {
        
        $cntChartMaxi++;
        $ChartMaxiData .= "['{$ChartMaxi->product->productName}',{$ChartMaxi->SumInCreOrDes},'{$colorChartMaxi[$cntChartMaxi-1]}','{$ChartMaxi->category->categoryName}'] ,";
        
    }

    foreach($ChartMinis as $ChartMini)
    {
        
        $cntChartMini++;
        $ChartMiniData .= "['{$ChartMini->product->productName}',{$ChartMini->SumInCreOrDes},'{$colorChartMini[$cntChartMini-1]}','{$ChartMini->category->categoryName}'] ,";
        
    }

    foreach($ChartCategory as $ChartCat)
    {

        $ChartCatData .= "['{$ChartCat->category->categoryName}' , {$ChartCat->CountPID}] ,";
        
    }

        
?>


@extends('layout.mainlayout')

@section('page_title' , 'CreateProducts')


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() 
        {
            var data = google.visualization.arrayToDataTable([
            ['Category', 'times'],

            <?php

                echo $ChartCatData;

            ?>

            ]);

            var options = {
            title: 'Category maximum Withdrawal amount',
            pieHole: 0.4,
            colors: ['#543E9E', '#4245A8', '#405891', '#427BA8', '#3E8D9E']
            };

            var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
            chart.draw(data, options);
        }


        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(ChartMaxi);
        function ChartMaxi() 
        {
            var data = google.visualization.arrayToDataTable([
                ["ProductName", "Quantity", { role: "style" } , { role: 'annotation' }],

                <?php 
                    echo $ChartMaxiData;
                ?>

            ]);

            var view = new google.visualization.DataView(data);

            var options = {
                title: "Graph of maximum withdrawal amount this month",
                width: 600,
                height: 200,
                bar: {groupWidth: "70%"},
                legend: { position: "none" },
            };
            var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
            chart.draw(view, options);
        }




        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart3);
        function drawChart3() 
        {
            var data = google.visualization.arrayToDataTable([
                ["ProductName", "Quantity", { role: "style" } , { role: 'annotation' }],
                <?php 
                    echo $ChartMiniData;
                ?>
            ]);

            var view = new google.visualization.DataView(data);

            var options = {
                title: "Graph of minimum withdrawal amount this month",
                width: 600,
                height: 200,
                bar: {groupWidth: "70%"},
                legend: { position: "none" },
            };
            var chart = new google.visualization.BarChart(document.getElementById("barchart_val"));
            chart.draw(view, options);
        }
        

    </script>
 

@section('content')



    <div class="row mt-3">
        <div class="col-md-12 order-md-1 container">
            <div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative bg-dark text-white">

                            <div class="col p-4 d-flex flex-column position-static">
                                <h4 class="display-5 font-italic">All Category This Month</h4>
                                <h4 class="display-5 font-italic">{{$AllCat}} list</h4>
                            </div>

                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative bg-dark text-white">

                            <div class="col p-4 d-flex flex-column position-static">
                                <h4 class="display-5 font-italic">All Product This Month</h4>
                                <h4 class="display-5 font-italic">{{$AllPro}} list</h4>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative bg-dark text-white">

                            <div class="col p-4 d-flex flex-column position-static">
                                <h4 class="display-5 font-italic">All Order This Month</h4>
                                <h4 class="display-5 font-italic">{{$AllOrder}} list</h4>
                            </div>

                        </div>
                    </div>


                </div>
            </div>

            <div>
                <div class ="row">

                    <div class="col-md-6">

                        <div id="donutchart" style="width: 700px; height: 400px;"></div>

                    </div>


                    <div class="col-md-6">

                        <div class="container ">
                            <div id="barchart_values" style="width: 100%;"></div>
                        </div>

                        <div class="container ">
                            <div id="barchart_val" style="width: 100%;"></div>
                        </div>

                    </div>

                </div>
            </div>


        </div>
    </div>






@endsection