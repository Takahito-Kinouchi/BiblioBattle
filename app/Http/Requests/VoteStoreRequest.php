<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VoteStoreRequest extends FormRequest
{
    public function authorize()
    {
        if ($this->path() == 'votes') {
            return true;
        } else {
            return false;
        }
    }

    public function rules()
    {
        return [
            
        ];
    }
}
