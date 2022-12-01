<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStockRequest extends FormRequest
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
            "name" => "required",
            "etablissement_id" => "exists:etablissements,id",
            "user_id" => "exists:users,id",
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'The name is required',
            'etablissement_id.exists'  => "The company doesn't exist",
            'user_id.exists'  => "The user doesn't exist",
        ];
    }

}
