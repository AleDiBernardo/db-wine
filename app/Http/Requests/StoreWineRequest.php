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
        return true;
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
            'review' => [ 'string', 'max:255'],
            'average' => [ 'numeric', 'min:0', 'max:10'],
            'genre' => [ 'string', 'max:255'],
            'image' => ['nullable', 'string', 'max:255'],
            'winery' => [ 'string', 'max:255'],
            'location' => ['nullable', 'string', 'max:255'],
        ];
    }
}
