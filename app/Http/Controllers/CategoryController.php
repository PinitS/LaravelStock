<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Categories = DB::table('product_tb')
        ->Join('category_tb' , 'product_tb.CategoryID' , '=' , 'category_tb.CategoryID')
        ->select([
                    '*' ,
                    DB::raw('Count(product_tb.Quantity) as CountCat')
                ])
        ->groupBy(DB::raw("category_tb.CategoryID"))
        ->orderBy('category_tb.CategoryID')
        ->get();
        return view('Category.index', ['Categories' => $Categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Category.create');
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

        foreach($Categories as $Category)
        {
            if($Category->CategoryName === $request->Category)
            {
                $request->session()->flash('error' , 'Category already exists');
                return redirect('Category');
            }
        }

        DB::table('category_tb')
                    ->insert([  'CategoryName' => $request->Category ,                 
                                'Description' => $request->Description 
                            ]);
            
        $request->session()->flash('message' , 'Created Successfully');
        return redirect('Category');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($category)
    {
        $ProductCategory = DB::table('product_tb')
                    ->Join('category_tb' , 'product_tb.CategoryID' , '=' , 'category_tb.CategoryID')
                    ->where('product_tb.CategoryID' , $category)
                    ->get();
        return view('Category.show', ['ProductCategory' => $ProductCategory]);

        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($category)
    {
        $Category = DB::table('category_tb')
                    ->where('CategoryID' , $category)->first();
        return view('Category.edit', ['Category' => $Category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category)
    {
        $Categories = DB::table('category_tb')
        ->get();

        foreach($Categories as $Cat)
        {
            if($Cat->CategoryName === $request->CategoryName)
            {
                if($request->CategoryID == $Cat->CategoryID)
                {
                    DB::table('category_tb')
                        ->where('CategoryID' , $request->CategoryID)
                        ->update([  
                                    'CategoryName' => $Cat->CategoryName ,                 
                                    'Description' => $request->Description 
                                ]);

                    $request->session()->flash('warning' , 'Successfully modified Description');
                    return redirect('Category');
                }
                $request->session()->flash('error' , 'Category already exists');
                return redirect('Category');
            }
        }
        DB::table('category_tb')
            ->where('CategoryID' , $request->CategoryID)
            ->update([  
                        'CategoryName' => $request->CategoryName ,                 
                        'Description' => $request->Description 
                    ]);

        $request->session()->flash('message' , 'Successfully modified');
        return redirect('Category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
