<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
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
            /**
             * validasi untuk nama dan harga
             * nama harus diisi dan unik
             * harga harus diisi dan lebih dari 0
             */
            'name'  => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
        ];
    }
    /**
     * Pesan error untuk validasi
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Nama layanan harus diisi',
            'name.string'   => 'Nama layanan harus berupa string',
            'name.max'      => 'Nama layanan tidak boleh lebih dari 100 karakter',
            'price.required' => 'Harga layanan harus diisi',
            'price.numeric'  => 'Harga layanan harus berupa angka',
            'price.min'      => 'Harga layanan tidak boleh kurang dari 0',
        ];
    }
}
