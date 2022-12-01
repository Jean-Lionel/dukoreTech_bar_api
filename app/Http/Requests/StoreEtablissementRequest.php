<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEtablissementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
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
            "description" => "sometimes",
            // "company_owner_id" => "required|numeric|exists:company_owners,id",
        ];
    }

}
