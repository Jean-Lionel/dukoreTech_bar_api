<?php

namespace App\Http\Controllers;

use App\Models\Vente;
use App\Http\Requests\StoreVenteRequest;
use App\Http\Requests\UpdateVenteRequest;

class VenteController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVenteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVenteRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vente  $vente
     * @return \Illuminate\Http\Response
     */
    public function show(Vente $vente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVenteRequest  $request
     * @param  \App\Models\Vente  $vente
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVenteRequest $request, Vente $vente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vente  $vente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vente $vente)
    {
        //
    }
}
