<?php

namespace App\Http\Controllers;

use App\Calpro;
use App\Product;
use App\Modelcal;
use Illuminate\Http\Request;
use DB;

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

        if($SimCal == null)
        {
            $SimCal = (object)['simcal' => '0'];      
        }

        return view('Calpro.show', ['Product' => $Product , 'Calpro' => $Calpro , 'Model_id' => $Model_id , 'SimCal' => $SimCal]);

    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Calpro  $calpro
     * @return \Illuminate\Http\Response
     */
    public function customedit($Pid , $Mid)
    {

        $edit_id = Calpro::with('product')
                            ->where('product_id' , $Pid)->first();

        $Model_id = Modelcal::where('id' , $Mid)->first();

        return view('Calpro.edit', ['edit_id' => $edit_id , 'Model_id' => $Model_id]);

    }

    public function customdelete($Pid , $Mid)
    {

        $edit_id = Calpro::where('modelcal_id' , $Mid)
                        ->where('product_id' , $Pid);
        $edit_id->delete();


        return redirect()->action('CalproController@show', ['Calpro' => $Mid]);  

    }

    public function edit($calpro)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Calpro  $calpro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $calpro)
    {
        Calpro::where('product_id' , $request->Pid)
        ->where('modelcal_id' , $request->Mid)
        ->update([  
                    'calquantity'=> $request->newQuantity,
                    'sumquantity' => 0,
                ]);

        $request->session()->flash('warning' , 'Successfully Update Quatity');
        return redirect()->action('CalproController@show', ['Calpro' => $request->Mid]);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Calpro  $calpro
     * @return \Illuminate\Http\Response
     */

    public function CheckSim(Request $request)
    {
        //return view('Calpro.check', ['Product' => $Product , 'Calpro' => $Calpro , 'Model_id' => $Model_id , 'SimCal' => $SimCal]);

        $check_sim = Calpro::with('product')
                            ->select(
                                        '*', DB::raw('Sum(sumquantity) AS SIM')
                                    )

                            ->groupBy('product_id')
                            ->get();

        return view('Calpro.check' ,['check_sim' => $check_sim]);

    }

    public function destroy(Calpro $calpro)
    {

    }
}
