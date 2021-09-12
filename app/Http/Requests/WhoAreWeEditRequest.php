<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WhoAreWeEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // c

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>'required|string',
            'pdf'=>'mimes:pdf',
            'status' =>'required',
            'order'=>'required',
            'who_are_we'=>'required'

    ];
    }
}
