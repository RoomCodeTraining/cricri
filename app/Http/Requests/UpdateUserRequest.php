<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'email' => 'nullable|email|unique:users,email,' . auth()->id(),
            'last_name' => 'nullable|string',
            'first_name' => 'nullable|string',
            'birth_date' => 'nullable|date',
            'address' => 'nullable|string',
            'phone' => 'nullable|string',
            'password' => 'nullable|string|min:6',
            'password_confirmation' => 'nullable|string|min:6|same:password',
            'municipality_uuid' => 'nullable|string',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            // 'email.required' => 'Le champ e-mail est requis.',
            // 'email.email' => 'Le champ e-mail doit être une adresse e-mail valide.',
            // 'email.unique' => 'Cet e-mail est déjà utilisé.',
            // 'last_name.required' => 'Le champ nom est requis.',
            // 'first_name.required' => 'Le champ prénom est requis.',
            // 'birth_date.date' => 'Le champ date de naissance doit être une date valide.',
            // 'password.min' => 'Le mot de passe doit avoir au moins :min caractères.',
            // 'c_password.min' => 'La confirmation du mot de passe doit avoir au moins :min caractères.',
            // 'c_password.same' => 'La confirmation du mot de passe ne correspond pas au mot de passe.',
        ];
    }
}
