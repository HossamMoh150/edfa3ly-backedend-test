<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class offerRequest extends FormRequest
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
        $segments = request()->segments();
        if (sizeof($segments) == 2){
            return [
                'percent_off' => 'required|numeric|min:0|max:100',
                'product_id' => 'required|exists:products,id'

            ];
        }
        else if (sizeof($segments) == 3){
            return [

                'percent_off' => 'required|numeric|min:0|max:100',
                'product_id' => 'required|exists:products,id'

            ];
        }

    }
}
