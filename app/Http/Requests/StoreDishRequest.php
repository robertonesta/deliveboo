<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDishRequest extends FormRequest
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
            'name' => 'required|max:255',
            'description' => 'nullable|max:3000',
            'ingredients' => 'nullable|max:3000',
            'visible' => 'boolean',
            'price' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'This dish must have a name!',
            'description.max' => 'The description length cannot be more than 3000 characters!',
            'ingredients.max' => 'The ingredients section length cannot be more than 3000 characters!',
            'price.required' => 'This dish must have a price!',
        ];
    }
}
