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

        $Categories = Category::withCount('product')->get();
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
        $Categories = Category::all();

        foreach($Categories as $Category)
        {
            if($Category->categoryName === $request->Category)
            {
                $request->session()->flash('error' , 'Category already exists');
                return redirect('Category');
            }
        }

        $Category = Category::create([
                                        'categoryName'=> $request->Category,
                                        'description'=> $request->Description
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
        $ProductCategory = Product::with('category')
                                    ->where('category_id' , $category)
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
        $Category = Category::where('id' , $category)->first();
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
        $Categories = Category::all();

        foreach($Categories as $Cat)
        {
            if($Cat->categoryName === $request->categoryName)
            {
                if($request->id == $Cat->id)
                {
                    Category::where('id' , $request->id)
                            ->update([  
                                        'categoryName' => $Cat->categoryName ,                 
                                        'Description' => $request->description 
                                    ]);

                    $request->session()->flash('warning' , 'Successfully modified Description');
                    return redirect('Category');
                }
                $request->session()->flash('error' , 'Category already exists');
                return redirect('Category');
            }
        }
        
        Category::where('id' , $request->id)
                ->update([  
                            'categoryName' => $request->categoryName ,                 
                            'Description' => $request->description 
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
