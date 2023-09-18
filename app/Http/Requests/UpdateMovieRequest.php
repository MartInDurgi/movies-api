<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMovieRequest extends FormRequest
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
            'title' => 'min:5|max:500|string|unique:movies',
            'director' => 'min:5|max:70|string',
            'image_url' => 'url',
            'duration' => 'integer|between:1,500',
            'release_date' => 'date|unique:movies',
            'genre' => 'min:5|max:70|string',
        ];
    }
}
