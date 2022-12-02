<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\BaseController;
use App\Models\Etablissement;
use App\Http\Requests\StoreEtablissementRequest;
use App\Http\Requests\UpdateEtablissementRequest;
use Illuminate\Http\Request;

class EtablissementController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = \Request::get('q');

        $etablissements = Etablissement::where(function($q) use($search){
            if(strlen($search) > 1){
                $searchElements = "%".$search."%";

                $q->where("tp_name", 'like',$searchElements)
                  ->orWhere("tp_type", 'like',$searchElements)
                  ->orWhere("tp_TIN", 'like',$searchElements)
                  ->orWhere("tp_trade_number", 'like',$searchElements)
                  ->orWhere("tp_postal_number", 'like',$searchElements)
                  ->orWhere("tp_phone_number", 'like',$searchElements)
                  ->orWhere("tp_address_privonce", 'like',$searchElements)
                  ->orWhere("tp_address_quartier", 'like',$searchElements)
                  ->orWhere("tp_address_commune", 'like',$searchElements)
                  ->orWhere("tp_address_rue", 'like',$searchElements)
                  ->orWhere("payment_type", 'like',$searchElements)
                  ;
            }
        })->latest()->take(2)->get();
        return $this->sendResponse($etablissements, "Sucessfully");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEtablissementRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEtablissementRequest $request)
    {
        $e = Etablissement::create($request->validated());

        return $this->sendResponse( $e,"Success,Etablissement registered");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etablissement  $etablissement
     * @return \Illuminate\Http\Response
     */
    public function show(Etablissement $etablissement)
    {
        return $etablissement;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEtablissementRequest  $request
     * @param  \App\Models\Etablissement  $etablissement
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEtablissementRequest $request, Etablissement $etablissement)
    {
        $etablissement->update($request->validated());

        return $this->sendResponse($etablissement, 'Etablissement updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etablissement  $etablissement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etablissement $etablissement)
    {
        $etablissement->delete();
        return ;
    }
}
