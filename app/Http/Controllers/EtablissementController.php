<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etablissement;
use App\Http\Controllers\API\BaseController;
use App\Http\Requests\StoreEtablissementRequest;
use App\Http\Requests\UpdateEtablissementRequest;
use Illuminate\Support\Facades\Validator;

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
    public function store(Request $request)
    {
       $input = $request->all();

       $validator = Validator::make($input, [
           "tp_name" => "required",
           "tp_type" => "sometimes|between:1,2",
           "tp_TIN" => "required|unique:etablissements|max:30",
           "tp_trade_number" => "sometimes",
           "tp_postal_number" => "sometimes",
           "tp_phone_number" => "sometimes",
           "tp_address_privonce" => "sometimes",
           "tp_address_quartier" => "sometimes",
           "tp_address_commune" => "sometimes",
           "tp_address_rue" => "sometimes",
           "tp_address_number" => "sometimes",
           "vat_taxpayer" => "sometimes|in:0,1",
           "ct_taxpayer" => "sometimes|in:0,1",
           "tl_taxpayer" => "sometimes|in:0,1",
           "tp_fiscal_center" => "sometimes|in:DGC,DMC,DPMC",
           "tp_activity_sector" => "sometimes",
           "tp_legal_form" => "sometimes",
           "payment_type" => "sometimes|in:1,2,3,4,5",
           "description" => "sometimes"
       ]);

       if($validator->fails()){
        return $this->sendError('Validation Error.', $validator->errors());
    }

    $e = Etablissement::create($input);

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
    public function update(UpdateEtablissementRequest $request, Etablissement $etablissement)
    {
        $etablissement->update($request->all());

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
