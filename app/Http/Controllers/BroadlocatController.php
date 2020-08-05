<?php

namespace App\Http\Controllers;

use App\Broadlocat;
use App\Modellocat;
use App\Province;
use Illuminate\Http\Request;

class BroadlocatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Modellocate = Modellocat::all();
        $Provinces = Province::all();
        
        return view('Broadlocat.create', ['Modellocate' => $Modellocate , 'Provinces' => $Provinces]);
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
        $Modellocate = Modellocat::all();
        $Provinces = Province::all();
        $Broadlocat = Broadlocat::all();
        if($request->model_id == 0 || $request->province == 0)
        {
            $request->session()->flash('warning' , 'Please Select Model Or Province!!');
            return view('Broadlocat.create', ['Modellocate' => $Modellocate , 'Provinces' => $Provinces]);
        }
        else
        {
            foreach($Broadlocat as $Broad)
            {
                if($Broad->serialbroad === $request->serial_broad)
                {
                    $request->session()->flash('error' , 'Serialbroad already exists');
                    return view('Broadlocat.create', ['Modellocate' => $Modellocate , 'Provinces' => $Provinces]); 
                }
            }
            Broadlocat::create([  
                                    'modellocat_id'=> $request->model_id,
                                    'serialbroad'=> $request->serial_broad,
                                    'customername'=> $request->customer_name,
                                    'province_id'=> $request->province,
                                    'address'=> $request->address,
                                    'setupdate'=> $request->date,
                                    'map'=> $request->maplink
                                ]);
            $request->session()->flash('message' , 'Add Broad Successfully');
            return redirect()->action('ModellocatController@create');  
        }
        
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Broadlocat  $broadlocat
     * @return \Illuminate\Http\Response
     */
    public function show(Broadlocat $broadlocat)
    {
        //
    }

    public function customshow($Pid , $Mid)
    {
    
        $ShowBroads = Broadlocat::with('province')
                                ->where('province_id' , $Pid)
                                ->where('modellocat_id' , $Mid)
                                ->get();
                                
        return view('Broadlocat.show', ['ShowBroads' => $ShowBroads]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Broadlocat  $broadlocat
     * @return \Illuminate\Http\Response
     */
    public function edit(Broadlocat $broadlocat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Broadlocat  $broadlocat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Broadlocat $broadlocat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Broadlocat  $broadlocat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Broadlocat $broadlocat)
    {
        //
    }
}
