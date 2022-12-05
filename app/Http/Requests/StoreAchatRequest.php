<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAchatRequest extends FormRequest
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
            "price_achat" => "required|numeric",
            "product_id" => "required|exists:products,id",
            "quantite" => "required|numeric",
            "prix_vente" => "required|numeric",
            "date_achat" => "sometimes|date|before_or_equal:today",
        ];
    }
}
