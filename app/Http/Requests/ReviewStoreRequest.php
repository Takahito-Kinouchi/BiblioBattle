<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // if ($this->path() == 'reviews') {
        //     return true;
        // } else {
        //     return false;
        // }
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'review_title' => ['required', 'min:6'],
            'book_title' => ['required', 'min:6'],
            'author' => ['required', 'min:6'],
            'publisher' => ['required', 'min:6'],
            'content' => ['required', 'min:50'],
        ];
    }
}
