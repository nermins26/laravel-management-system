<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PracticeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; //change to false when auth is implemented
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'fields_of_practice' => 'required|array|min:1',
            'fields_of_practice.*' => 'exists:field_of_practices,id',
            'website_url' => 'nullable|url|max:255',
            'image' => 'nullable|image|dimensions:min_width=100,min_height=100|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}

