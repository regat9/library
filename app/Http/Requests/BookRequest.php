<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:2|string',
            'slug' => 'required|min:2|string',
            'author' => 'required|min:2|string',
            'description' => 'required|min:2|string',
            'rating' => 'required|integer',
            'cover' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'categories' => 'array',
        ];
    }
}