<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveOrderRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:55',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'address' => 'required|max:255',
            'comment' => 'nullable|string',
        ];
    }
}
