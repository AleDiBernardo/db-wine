<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWineRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'slug' => ['required', 'unique:wines,slug', 'string', 'max:255'],
            'wine' => ['required', 'string', 'max:255'],
            'review' => ['required', 'string', 'max:255'],
            'average' => ['required', 'numeric', 'min:0', 'max:10'],
            'genre' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'string', 'max:255'],
            'winery' => ['required', 'string', 'max:255'],
            'location' => ['nullable', 'string', 'max:255'],
        ];
    }
}
