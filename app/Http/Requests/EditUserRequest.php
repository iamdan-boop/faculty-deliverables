<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditUserRequest extends FormRequest
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
            'name' => 'required|max:25|min:8',
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->route('id'))],
            'contactNumber' => ['required', 'regex:/(09)[0-9]{9}/', Rule::unique('users')->ignore($this->route('id'))],
            'password' => 'sometimes|nullable|string|min:6',
            'position' => 'required|min:3',
            'campus' => 'required|min:8',
        ];
    }
}
