<?php

namespace App\Http\Controllers;

use App\Modellocat;
use App\Broadlocat;
Use DB;
use Illuminate\Http\Request;

class ModellocatController extends Controller
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
        $Modellocate = Modellocat::withCount('broadlocat')->get();
        return view('Modellocat.create', ['Modellocate' => $Modellocate]);
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

        foreach($Modellocate as $Model)
        {
            if($Model->modellocatname === $request->modelname)
            {
                $request->session()->flash('error' , 'Model already exists');
                return redirect()->action('ModellocatController@create');  
            }
        }

        Modellocat::create([  
                            'modellocatname'=> $request->modelname,
                        ]);

        $request->session()->flash('message' , 'Created Model Successfully');
        return redirect()->action('ModellocatController@create');  
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modellocat  $modellocat
     * @return \Illuminate\Http\Response
     */
    public function show($modellocat)
    {
        $Broadlocat = Broadlocat::with('province')
                                ->with('modellocat')
                                ->select(
                                    '*', DB::raw('count(province_id) as Cntprovine')
                                )
                                ->where('modellocat_id',$modellocat)
                                ->groupBy('province_id' ,'modellocat_id')
                                ->get();
        return view('Modellocat.show', ['Broadlocat' => $Broadlocat]);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modellocat  $modellocat
     * @return \Illuminate\Http\Response
     */
    public function edit(Modellocat $modellocat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modellocat  $modellocat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modellocat $modellocat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modellocat  $modellocat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modellocat $modellocat)
    {
        //
    }
}
