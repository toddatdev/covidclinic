<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequestUpdate extends FormRequest
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
            'u_name' => ['required', 'string', 'max:255'],
            'u_email' => ['required'],
            'u_password' => 'required|confirmed',
            'u_password_confirmation' => 'required'
        ];
    }
}
