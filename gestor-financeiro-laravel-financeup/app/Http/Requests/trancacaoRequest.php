<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class trancacaoRequest extends FormRequest
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
            'data' => 'required|date',
            'category' => 'required|string|max:255',
            'type' => 'required|in:ganho,gasto',
            'values' => 'required|numeric',
        ];
 
    }
}
