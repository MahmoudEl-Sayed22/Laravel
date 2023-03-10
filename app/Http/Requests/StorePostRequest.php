<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:10'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title Field is required',
            'title.min' => 'title length should be at least 3 char',
            'description.required'=>'Description Field is required',
            'description.min'=>'description length should be at least 10 gichar',
        ];
    }
}
