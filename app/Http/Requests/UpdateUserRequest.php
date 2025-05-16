<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        $userId = $this->user->id ?? $this->route('user'); // fallback jika $this->user null

        $rules = [
            'name'     => 'required|string|max:255',
            'email'    => "required|email|unique:users,email,$userId",
            'role'     => 'required|exists:roles,name',
        ];

        // Jika password ada dalam request, beri validasi
        if ($this->filled('password')) {
            $rules['password'] = 'nullable|min:8';
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'name.required'     => 'Nama tidak boleh kosong',
            'email.required'    => 'Email tidak boleh kosong',
            'email.email'       => 'Format email tidak valid',
            'password.min'     => 'Password minimal 8 karakter',
            'email.unique'      => 'Email sudah terdaftar',
            'role.required'     => 'Role tidak boleh kosong',
            'role.exists'       => 'Role tidak valid',
        ];
    }
}
