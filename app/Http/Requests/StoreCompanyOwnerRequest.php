<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyOwnerRequest extends FormRequest
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
            "first_name" => "required",
            "last_name" => "required",
            "title" => "required",
            "status" => "sometimes",
            "telephone_mobile" => "required",
            "telephone" => "sometimes",
            "email" => "required",
            "address" => "sometimes",
            "nationality" => "sometimes",
            "description" => "sometimes",
            "user_id" => "required",
            "etablissement_id" => "required|exists:etablissements",
        ];
    }
}
