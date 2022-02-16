<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendPackageRequest extends FormRequest
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
            'user_id' => 'required|string',
            'sender' => 'required|regex:/(09)[0-9]{9}/',
            'courier' => 'required|regex:/(09)[0-9]{9}/',
            'destination' => 'required|string',
            'deliveryDate' => 'date|required',
            'position' => 'required|string',
            // 'packageNames' => 'array|required',
            // 'quantities' => 'array|required' 
        ];
    }
}
