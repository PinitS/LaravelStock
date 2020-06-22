<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Order;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Categories = DB::table('category_tb')->get();
        return view('Product.create', ['Categories' => $Categories]);
    }

    public function search(Request $request)
    {
        $search = $request->get('SearchProductName');
        $Products = DB::table('product_tb')
                    ->join('category_tb' , 'product_tb.CategoryID' , '=' , 'category_tb.CategoryID')
                    ->where('product_tb.ProductName' , 'like' , '%' .$search.'%')
                    ->orderByRaw('category_tb.CategoryID ASC , product_tb.ProductName ASC')
                    ->get();
        return view('Product.search', ['Products' => $Products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Categories = DB::table('category_tb')->get();

        if($request->categoryid > 0)
        {
            $Products = DB::table('product_tb')->get();

            foreach($Products as $Product)
            {
                if($Product->ProductName === $request->Product)
                {
                    $request->session()->flash('error' , 'Product already exists');
                    return redirect('Category');
                }

            }

            DB::table('product_tb')
                ->insert([  
                            'ProductName'=> $request->Product,
                            'CategoryID'=> $request->categoryid,
                            'Unit'=> $request->Unit,
                            'Quantity'=> $request->Quantity
                        ]);

            $addOrder = DB::table('product_tb')
                        ->where('ProductName' , $request->Product)->first();


            DB::table('order_tb')
                ->insert([  
                            'ProductID'=> $addOrder->ProductID,
                            'datetime'=> Carbon::now(),
                            'TypeID'=> 1,
                            'InCreOrDes'=> $request->Quantity,
                            'ReportQuantity'=> $request->Quantity
                        ]);


            $request->session()->flash('message' , 'Created Successfully');
        }
        else
        {
            $request->session()->flash('warning' , 'Please Selected Category');
        }
        return redirect('Category');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($product)
    {
 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($product)
    {
        $Product = DB::table('product_tb')
                ->where('ProductID' , $product)->first();

        $Categories = DB::table('category_tb')
                ->get();
        
        return view('Product.edit', ['Product' => $Product , 'Categories' => $Categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $reportQua = DB::table('product_tb')
                    ->where('ProductID' , $request->ProductID)->first();

        $ValReportQ = '';

        if($request->Checkfill == 'fillQuantity')
        {
            if($request->Change == 1)
            {
                DB::table('product_tb')
                    ->where('ProductID' , $request->ProductID)
                    ->increment('Quantity', $request->InCreOrDes);
                    $ValReportQ = ($reportQua->Quantity)+($request->InCreOrDes);

            }
            else
            {
                DB::table('product_tb')
                    ->where('ProductID' , $request->ProductID)
                    ->decrement('Quantity', $request->InCreOrDes);
                    $ValReportQ = ($reportQua->Quantity)-($request->InCreOrDes);

            }

            DB::table('order_tb')
                ->insert([  
                            'ProductID'=> $request->ProductID,
                            'datetime'=> Carbon::now(),
                            'TypeID'=> $request->Change,
                            'InCreOrDes'=> $request->InCreOrDes,
                            'ReportQuantity'=> $ValReportQ
                        ]);

            $request->session()->flash('message' , 'Updated Quantity Successfully');
            return redirect('/search');

        }

        else
        {
            $Product = DB::table('product_tb')->get();
            foreach ($Product as $pro)
            {
                if($pro->ProductName === $request->ProductName)
                {
                    if($request->ProductID == $pro->ProductID)
                    {
                        DB::table('product_tb')
                            ->where('ProductID' , $request->ProductID)
                            ->update([  
                                        'ProductName' => $pro->ProductName , 
                                        'Unit' => $request->Unit,                
                                        'CategoryID' => $request->CategoryID,
                                    ]);
    
                        $request->session()->flash('warning' , 'Successfully modified');
                        return('KUY');
                        return redirect('/search');
                    }
                    $request->session()->flash('error' , 'Product already exists');
                    return('Hee');
                    return redirect('/search');
                }
    
            }

            DB::table('product_tb')
            ->where('ProductID' , $request->ProductID)
            ->update([  'ProductName' => $request->ProductName , 
                        'Unit' => $request->Unit,
                        'CategoryID' => $request->CategoryID,               
                        
                        
                    ]);

            $request->session()->flash('message' , 'Successfully modified');
            return redirect('/search');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
