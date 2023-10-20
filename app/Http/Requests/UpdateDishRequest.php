<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDishRequest extends FormRequest
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
            "photo" => 'nullable', 'image', 'mimes:jpg,png,jpeg,gif,svg',
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
            'name.max' => 'The name length cannot be more than 255 characters!',
            'photo.size' => 'The image size cannot be more than 2048 KB',
            'photo.image' => 'The file must be an image!',
            'photo.mimes' => 'The image must be JPG, PNG, JPEG, GIF or SVG format!',
            'description.max' => 'The description length cannot be more than 3000 characters!',
            'ingredients.max' => 'The ingredients section length cannot be more than 3000 characters!',
            'price.required' => 'This dish must have a price!',
        ];
    }
}
