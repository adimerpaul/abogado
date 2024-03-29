<?php

namespace App\Http\Controllers;

use App\Models\Etapa;
use Illuminate\Http\Request;

class EtapaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Etapa::orderBy('nombre','asc')->get();
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
        $etapa= new Etapa;
        $etapa->numero=strtoupper($request->numero);
        $etapa->nombre=strtoupper($request->nombre);
        $etapa->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etapa  $etapa
     * @return \Illuminate\Http\Response
     */
    public function show(Etapa $etapa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etapa  $etapa
     * @return \Illuminate\Http\Response
     */
    public function edit(Etapa $etapa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etapa  $etapa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etapa $etapa)
    {
        $etapa=Etapa::find($request->id);
        $etapa->numero=strtoupper($request->numero);
        $etapa->nombre=strtoupper($request->nombre);
        $etapa->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etapa  $etapa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etapa $etapa)
    {
        $etapa->delete();
    }
}
