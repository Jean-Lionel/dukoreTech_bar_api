<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\BaseController;
use App\Models\Achat;
use App\Http\Requests\StoreAchatRequest;
use App\Http\Requests\UpdateAchatRequest;
use App\Models\Lot;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class AchatController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Achat::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAchatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAchatRequest $request)
    {
        $achat = [
            "product_id" => $request->product_id,
            "price_achat" => $request->price_achat,
            "quantite" => $request->quantite,
            "prix_total" => ($request->price_achat * $request->quantite),
            "prix_vente" => $request->prix_vente,
            "date_achat" => $request->date_achat,
            "lot_id" => $request->lot_id,
            "user_id" => Auth::user()->id,
        ];
            $product = Product::find($request->product_id);
            $product->quantity += $achat["quantite"];
            $lot = Lot::find($request->lot_id);

            if($lot){
                $lot->quantity += $achat["quantite"];
                $lot->save();
            }
            $product->save();
            $achatProduct = Achat::create($achat);

        return $this->sendResponse( $achatProduct,"Success,Lot registered");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Achat  $achat
     * @return \Illuminate\Http\Response
     */
    public function show(Achat $achat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAchatRequest  $request
     * @param  \App\Models\Achat  $achat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAchatRequest $request, Achat $achat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Achat  $achat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Achat $achat)
    {
        //
    }
}
