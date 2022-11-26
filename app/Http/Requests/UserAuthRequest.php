<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAuthRequest extends FormRequest
{
    public function authorize()
    {
        if ($this->path() == 'users/authenticate') {
            return true;
        } else {
            return false;
        }
    }

    public function rules()
    {
        return [
            'email' => ['required', 'email'],
            'password' => 'required|min:6',
        ];
    }
}
