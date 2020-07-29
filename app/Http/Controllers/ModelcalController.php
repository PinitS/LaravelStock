<?php

namespace App\Http\Controllers;

use App\Modelcal;
use Illuminate\Http\Request;

class ModelcalController extends Controller
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
        $Modelcals = Modelcal::all();
        return view('Modelcal.create', ['Modelcals' => $Modelcals]);
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
        return $request;
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modelcal  $modelcal
     * @return \Illuminate\Http\Response
     */
    public function show(Modelcal $modelcal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modelcal  $modelcal
     * @return \Illuminate\Http\Response
     */
    public function edit(Modelcal $modelcal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modelcal  $modelcal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modelcal $modelcal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modelcal  $modelcal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modelcal $modelcal)
    {
        //
    }
}
