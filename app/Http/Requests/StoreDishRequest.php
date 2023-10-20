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
            'photo' => 'image|required|mimes:jpg,png,jpeg,gif,svg',
            'description' => 'nullable|max:3000',
            'ingredients' => 'nullable|max:3000',
            'visible' => 'boolean',
            'price' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Il piatto deve avere un nome!',
            'name.max' => 'Il nome non può superare i 255 caratteri!',
            'photo.image' => 'Il file deve essere di tipo immagine!',
            'photo.required' => 'La foto è obbligatoria.',
            'photo.mimes' => 'L\'immagine deve avere uno dei seguenti formati: JPG, PNG, JPEG, GIF or SVG format!',
            'description.max' => 'La descrizione non può superare i 3000 caratteri!',
            'ingredients.max' => 'La sezione degli ingredienti non può superare i 3000 caratteri!',
            'price.required' => 'Il piatto deve avere un prezzo!',
        ];
    }
}
