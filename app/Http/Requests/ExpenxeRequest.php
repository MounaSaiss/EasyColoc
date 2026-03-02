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
            'title' => 'required|string|max:255',
            'montant' => 'required|numeric|min:0',
            'dateAchat' => 'required|date',
            'category_id' => 'required|exists:categories,id',
            'colocation_id' => 'required|exists:colocations,id',
            'user_idPayer' => 'required|exists:users,id',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Le titre est requis',
            'montant.required' => 'Le montant est requis',
            'dateAchat.required' => 'La date d\'achat est requise',
            'category_id.required' => 'La catégorie est requise',
            'colocation_id.required' => 'La colocation est requise',
            'idPayer.required' => 'Le payeur est requis',
        ];
    }
}
