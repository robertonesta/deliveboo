<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRestaurantRequest extends FormRequest
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
            "photo" => ['nullable', 'image', 'mimes:jpg,png,jpeg,gif,svg'],
            'name' => 'required|max:60',
            'address' => 'required|min:5',
            'piva' => 'required|size:11'
        ];
    }
    public function messages(){

        return [
        'name.required' => 'Name is required.',
        'name.max' => 'The name must have a maximum of 60 characters.',

        'address.required' => 'The address is required.',
        'address.min' => 'The address must have a minimum of 5 characters.',

        'photo.image' => 'Must be an image.',
        'photo.mimes' => 'The image must be JPG, PNG, JPEG, GIF or SVG format.',

        'piva.required' => 'Vat is required',
        'piva.size' => 'Vat must have 11 characters',
        ];
    }

}