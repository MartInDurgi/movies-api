<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
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
            'title' => 'required|min:5|max:500|string|unique:movies',
            'director' => 'required|min:5|max:70|string',
            'image_url' => 'url',
            'duration' => 'required|integer|between:1,500',
            'release_date' => 'required|date|unique:movies',
            'genre' => 'required|min:5|max:70|string',
        ];
    }
}
/* $table->string('title');
            $table->string('director');
            $table->string('image_url');
            $table->integer('duration');
            $table->date('release_date');
            $table->string('genre'); */
