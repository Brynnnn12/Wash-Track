<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            //validasi data yang masuk
            'name'     => 'required|string|max:55',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'role'     => 'required|exists:roles,name',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'     => 'Nama tidak boleh kosong',
            'email.required'    => 'Email tidak boleh kosong',
            'email.email'       => 'Format email tidak valid',
            'email.unique'      => 'Email sudah terdaftar',
            'password.required' => 'Password tidak boleh kosong',
            'role.required'     => 'Role tidak boleh kosong',
            'role.exists'       => 'Role tidak valid',
        ];
    }
}
