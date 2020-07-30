<?php

namespace App\Http\Controllers;

use App\Calpro;
use App\Product;
use App\Modelcal;
use Illuminate\Http\Request;

class CalproController extends Controller
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
        $UpdateCal = Calpro::where('modelcal_id' , $request->id)->get();

        if($request->submit == "AddIN")
        {
            if($request->pro_id == 0)
            {
                $request->session()->flash('warning' , 'Please Selected Product');
                return redirect()->action('CalproController@show', ['Calpro' => $request->id]);
            }
            else
            {
                foreach($UpdateCal as $Addname)
                {
                    if($Addname->product_id == $request->pro_id)
                    {
                        $request->session()->flash('error' , 'Product already exists In Model');
                        return redirect()->action('CalproController@show', ['Calpro' => $request->id]);
                    }
                }
                Calpro::create([
                                'modelcal_id'=> $request->id,
                                'product_id'=> $request->pro_id,
                                'calquantity'=> $request->quantity,
                                'sumquantity'=> 0,
                                'simcal'=> 0,
                            ]);
                $request->session()->flash('message' , 'Add Product In Model Successfully');
                return redirect()->action('CalproController@show', ['Calpro' => $request->id]);   
            }
        }
        else
        {
            
            foreach($UpdateCal as $Update)
            {
                Calpro::where('product_id' , $Update->product_id)
                        ->where('modelcal_id' , $request->id)
                        ->update([  
                                    'simcal'=> $request->SimCal,
                                    'sumquantity' => ($Update->calquantity)* ($request->SimCal),
                                ]);
            }

            return redirect()->action('CalproController@show', ['Calpro' => $request->id]);  
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Calpro  $calpro
     * @return \Illuminate\Http\Response
     */
    public function show($calpro)
    {

        $Product = Product::all();        
        $Calpro = Calpro::with('product')
                        ->where('modelcal_id' , $calpro)
                        ->get();
        $Model_id = Modelcal::where('id' , $calpro)->first();

        $SimCal = Calpro::where('modelcal_id' , $calpro)->first();

        return view('Calpro.show', ['Product' => $Product , 'Calpro' => $Calpro , 'Model_id' => $Model_id , 'SimCal' => $SimCal]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Calpro  $calpro
     * @return \Illuminate\Http\Response
     */
    public function edit(Calpro $calpro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Calpro  $calpro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Calpro $calpro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Calpro  $calpro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calpro $calpro)
    {
        //
    }
}
