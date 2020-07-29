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
        $Categories = Category::all();
        return view('Product.create', ['Categories' => $Categories]);
    }

    public function search(Request $request)
    {
        $search = $request->get('SearchProductName');

        $Products = Product::with('category')
                            ->where('productName' , 'like' , '%' .$search.'%')
                            ->orderby('id' ,'asc')
                            ->get()
                            ->sortBy('category.id');

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
        return $request;
        $Categories = Category::all();

        if($request->category_id > 0)
        {
            $Products = Product::all();

            foreach($Products as $Product)
            {
                if($Product->productName === $request->productName)
                {
                    $request->session()->flash('error' , 'Product already exists');
                    return redirect('Category');
                }

            }

            Product::create([
                                'productName'=> $request->productName,
                                'category_id'=> $request->category_id,
                                'unit'=> $request->unit,
                                'quantity'=> $request->quantity
                            ]);

            $addOrder = Product::where('productName' , $request->productName)->first();

            Order::create([
                                'product_id'=> $addOrder->id,
                                'type_id'=> 1,
                                'category_id'=> $request->category_id,
                                'inCreOrDes'=> $request->quantity,
                                'reportQuantity'=> $request->quantity,
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

        $Product = Product::where('id' , $product)->first();
        $Categories = Category::all();        
        
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
        ////////////////////////////////////////////////////////////////////////////////////////////////////////
        // $reportQua = DB::table('product_tb')
        //             ->where('id' , $request->id)->first();

        $reportQua = Product::where('id' , $request->id)->first();
        $ValReportQ = '';
        
        if($request->Checkfield == 'fieldQuantity')
        {
            if($request->Change == 1)
            {
                Product::where('id' , $request->id)
                        ->increment('quantity', $request->InCreOrDes);
                $ValReportQ = ($reportQua->quantity)+($request->InCreOrDes);

            }
            else
            {
                Product::where('id' , $request->id)
                        ->decrement('quantity', $request->InCreOrDes);
                $ValReportQ = ($reportQua->quantity)-($request->InCreOrDes);

            }

            Order::create([
                            'product_id'=> $request->id,
                            'type_id'=> $request->Change,
                            'category_id'=> $reportQua->category_id,
                            'inCreOrDes'=> $request->InCreOrDes,
                            'reportQuantity'=> $ValReportQ
                        ]);

            $request->session()->flash('message' , 'Updated Quantity Successfully');
            return redirect('/search');

        }

        else
        {
            $Product = Product::all();
            foreach ($Product as $pro)
            {
                if($pro->productName === $request->productName)
                {
                    if($request->id == $pro->id)
                    {
                        Product::where('id' , $request->id)
                                ->update([  
                                            'productName' => $pro->productName , 
                                            'unit' => $request->unit,                
                                            'category_id' => $request->category_id,
                                        ]);
    
                        $request->session()->flash('warning' , 'Successfully modified');
                        return redirect('/search');
                    }
                    $request->session()->flash('error' , 'Product already exists');
                    return redirect('/search');
                }
    
            }


            Product::where('id' , $request->id)
                    ->update([  
                                'productName' => $request->productName , 
                                'unit' => $request->unit,
                                'category_id' => $request->category_id              
                            ]);

            $request->session()->flash('message' , 'Successfully modified');
            return redirect('/search');
        }
        ////////////////////////////////////////////////////////////////////////////////////////////////////////
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
