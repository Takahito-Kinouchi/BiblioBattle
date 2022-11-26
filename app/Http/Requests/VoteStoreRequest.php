<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VoteStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->path() == 'votes/upvote' || $this->path() == 'votes/downvote') {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'review_id' => 'required',
        ];
    }
}
