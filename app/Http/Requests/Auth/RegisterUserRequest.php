<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
            'name' => 'required|max:20',
            'contactNumber' => 'required|regex:/(09)[0-9]{9}/',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'campus' => 'required|string',
            'position' => 'required|string'
        ];
    }
}
