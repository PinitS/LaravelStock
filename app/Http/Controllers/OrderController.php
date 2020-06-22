<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    

    public function dashboard(Request $request)
    {
        $now = Carbon::now();

        $ChartMaxis = DB::table('order_tb')
            ->join('product_tb' , 'product_tb.ProductID' , '=' , 'order_tb.ProductID')
            ->join('category_tb' , 'category_tb.CategoryID' , '=' , 'product_tb.CategoryID')
            ->select(
                        'ProductName' , 'CategoryName' , 'datetime', DB::raw('Sum(order_tb.InCreOrDes) AS SumInCreOrDes') , DB::raw('Count(category_tb.CategoryID) AS CountCategoryID')
                    )

            ->where('TypeID' , 2)
            ->whereMonth('datetime', '=', $now->month)
            ->whereYear('datetime', '=', $now->year)
            ->groupBy('order_tb.ProductID' , 'order_tb.TypeID')
            ->orderBy("SumInCreOrDes" , "DESC")
            ->limit(5)
            ->get();


        $ChartMinis = DB::table('order_tb')
            ->join('product_tb' , 'product_tb.ProductID' , '=' , 'order_tb.ProductID')
            ->join('category_tb' , 'category_tb.CategoryID' , '=' , 'product_tb.CategoryID')
            ->select(
                        'ProductName' , 'CategoryName' , 'datetime', DB::raw('Sum(order_tb.InCreOrDes) AS SumInCreOrDes') , DB::raw('Count(category_tb.CategoryID) AS CountCategoryID')
                    )

            ->where('TypeID' , 2)
            ->whereMonth('datetime', '=', $now->month)
            ->whereYear('datetime', '=', $now->year)
            ->groupBy('order_tb.ProductID' , 'order_tb.TypeID')
            ->orderBy("SumInCreOrDes" , "ASC")
            ->limit(5)
            ->get();


        $ChartCategory = DB::table('order_tb')
            ->join('product_tb' , 'product_tb.ProductID' , '=' , 'order_tb.ProductID')
            ->join('category_tb' , 'category_tb.CategoryID' , '=' , 'product_tb.CategoryID')
            ->select(
                        '*' , 'category_tb.CategoryName' , DB::raw('COUNT(order_tb.ProductID) AS CountPID')
                    )
            ->where('TypeID' , 2)
            ->whereMonth('datetime', '=', $now->month)
            ->whereYear('datetime', '=', $now->year)
            ->groupBy('category_tb.CategoryID')
            ->limit(5)
            ->get();

            //return $ChartCategory;

        $AllCat = DB::table('order_tb')
            ->join('product_tb' , 'product_tb.ProductID' , '=' , 'order_tb.ProductID')
            ->distinct()
            ->whereMonth('datetime', '=', $now->month)
            ->whereYear('datetime', '=', $now->year)
            ->count('product_tb.CategoryID');

        $AllOrder = DB::table('order_tb')
            ->distinct()
            ->whereMonth('datetime', '=', $now->month)
            ->whereYear('datetime', '=', $now->year)
            ->count('order_tb.OrderID');

        $AllPro = DB::table('order_tb')
            ->distinct()
            ->whereMonth('datetime', '=', $now->month)
            ->whereYear('datetime', '=', $now->year)
            ->count('order_tb.ProductID');

        return view('Order.dashboard' , 
                [
                    'ChartMaxis' => $ChartMaxis , 
                    'ChartMinis' => $ChartMinis , 
                    'ChartCategory' => $ChartCategory , 
                    'AllCat' => $AllCat , 
                    'AllOrder' => $AllOrder , 
                    'AllPro' => $AllPro
                 ] );
    }

    public function report(Request $request)
    {
        $year = $request->get('year');
        $mount = $request->get('month');
        $checked = $request->get('checkbox');
        if($checked == 1)
        {
            $reports = DB::table('order_tb')
            ->join('product_tb' , 'order_tb.ProductID' , '=' , 'product_tb.ProductID')
            ->join('type_tb' , 'order_tb.TypeID' , '=' , 'type_tb.TypeID')

            //type 2
            // ->select([
            //             '*' ,
            //             DB::raw('Sum(product_tb.Quantity) as SumQuantity')
            //         ])

            // ->groupBy('product_tb.ProductID','type_tb.TypeID')
            // ->orderByRaw("product_tb.ProductID ASC , type_tb.TypeID ASC")

            ->orderByRaw("product_tb.ProductID ASC , order_tb.OrderID ASC")
            ->whereYear('datetime', '=', $year)
            ->get();
        }

        else
        {
            $reports = DB::table('order_tb')
            ->join('product_tb' , 'order_tb.ProductID' , '=' , 'product_tb.ProductID')
            ->join('type_tb' , 'order_tb.TypeID' , '=' , 'type_tb.TypeID')

            //type 2
            // ->select([
            //             '*' ,
            //             DB::raw('Sum(product_tb.Quantity) as SumQuantity')
            //         ])

            // ->groupBy('product_tb.ProductID','type_tb.TypeID')
            // ->orderByRaw("product_tb.ProductID ASC , type_tb.TypeID ASC")

            ->orderByRaw("product_tb.ProductID ASC , order_tb.OrderID ASC")
            ->whereYear('datetime', '=', $year)
            ->whereMonth('datetime', '=', $mount)
            ->get();
        }

        return view('Order.report', ['reports' => $reports ,'mount' => $mount , 'year' => $year , 'checked' => $checked]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

}
