<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class authAdmin extends FormRequest
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
            'email' => 'required|email|exists:admins,email',
            'password' => 'required'
        ];
    }

    public function messages() {
        return [
            'email.required' => 'please enter email please please' // just for test
        ];
    }
}
