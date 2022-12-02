<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateLotRequest extends FormRequest
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
            "name" =>  [
                'required',
                Rule::unique('lots')
                // ->where('date_expiration', $this->date_expiration)
                ->where('product_id', $this->product_id)
            ],
            // "date_expiration"=> "sometimes|nullable|date",
            "quantity"=>"required|numeric",
            "product_id"=> "sometimes|exists:products,id",
            "user_id"=> "sometimes|exists:users,id",
        ];
    }
}
