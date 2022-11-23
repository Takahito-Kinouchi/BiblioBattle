<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    public function authorize()
    {
        if ($this->path() == 'users') {
            return true;
        } else {
            return false;
        }
    }

    public function rules()
    {
        return [
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6',]
        ];
    }
}
