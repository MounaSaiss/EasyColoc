<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpenxeRequest extends FormRequest
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
            'description' => 'required|string|max:255',
            'montant' => 'required|numeric|min:0',
            'dateAchat' => 'required|date',
            'category_id' => 'required|exists:categories,id',
            'colocation_id' => 'required|exists:colocations,id',
            'idPayer' => 'required|exists:users,id',
        ];
    }
}
