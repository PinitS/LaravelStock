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

        $ChartMaxis = Order::with('category')
                            ->with('product')
                            ->select(
                                        '*', DB::raw('Sum(InCreOrDes) AS SumInCreOrDes')
                                    )
                            ->where('type_id' , 2)
                            ->whereMonth('created_at', $now->month)
                            ->whereYear('created_at', $now->year)
                            ->groupBy('product_id' , 'type_id')
                            ->orderBy("SumInCreOrDes" , "DESC")
                            ->limit(5)
                            ->get();


        $ChartMinis = Order::with('category')
                            ->with('product')
                            ->select(
                                        '*', DB::raw('Sum(InCreOrDes) AS SumInCreOrDes')
                                    )
                            ->where('type_id' , 2)
                            ->whereMonth('created_at', $now->month)
                            ->whereYear('created_at', $now->year)
                            ->groupBy('product_id' , 'type_id')
                            ->orderBy("SumInCreOrDes" , "ASC")
                            ->limit(5)
                            ->get();


        $ChartCategory = Order::with('category')
                                    ->with('product')
                                    ->select(
                                                '*' , DB::raw('COUNT(product_id) AS CountPID')
                                            )
                                    ->where('type_id' , 2)
                                    ->whereMonth('created_at', $now->month)
                                    ->whereYear('created_at', $now->year)
                                    ->groupBy('category_id')
                                    ->limit(5)
                                    ->get();

        $AllCat = Order::distinct()
                ->whereMonth('created_at', $now->month)
                ->whereYear('created_at', $now->year)
                ->count('category_id');

        $AllPro = Order::distinct()
                ->whereMonth('created_at', $now->month)
                ->whereYear('created_at', $now->year)
                ->count('product_id');

        $AllOrder = Order::distinct()
                ->whereMonth('created_at', $now->month)
                ->whereYear('created_at', $now->year)
                ->count('id');

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
            $reports = Order::with('product')
                            ->with('category')
                            ->whereYear('created_at', $year)
                            ->orderBy('id', 'asc')
                            ->get()
                            ->sortBy('product.id');
        }
        //->orderByRaw("product_tb.ProductID ASC , order_tb.OrderID ASC")
        else
        {
            $reports = Order::with('product')
                            ->with('category')
                            ->whereYear('created_at', $year)
                            ->whereMonth('created_at', $mount)
                            ->orderBy('id', 'asc')
                            ->get()
                            ->sortBy('product.id');
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
