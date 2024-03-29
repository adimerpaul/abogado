<?php

namespace App\Http\Controllers;

use App\Models\Demandado;
use Illuminate\Http\Request;

class DemandadoController extends Controller
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
     * @param  \App\Models\Demandado  $demandado
     * @return \Illuminate\Http\Response
     */
    public function show($ci)
    {
        //
        return Demandado::where('ci',$ci)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Demandado  $demandado
     * @return \Illuminate\Http\Response
     */
    public function edit(Demandado $demandado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Demandado  $demandado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Demandado $demandado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Demandado  $demandado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Demandado $demandado)
    {
        //
    }

    public function listdemandado($ci){
        return Demandado::where('ci',$ci)->with('despachos')->get();
    }
}
