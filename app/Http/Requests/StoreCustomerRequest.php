<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
             * Validasi untuk field
             */

            "name" => "nullable|string|max:60",
            "phone" => "nullable|string|max:15",
            "address" => "nullable|string|max:100",
            "vehicle_type" => "required|string|max:40",
            "vehicle_plate" => "required|string|max:15",
        ];
    }

    /**
     * Get custom  for messages.
     */
    public function messages(): array
    {
        return [
            "name.max" => "Nama maksimal 60 karakter",
            "phone.max" => "Nomor telepon maksimal 15 karakter",
            "address.max" => "Alamat maksimal 100 karakter",
            "vehicle_type.max" => "Tipe kendaraan maksimal 40 karakter",
            "vehicle_type.required" => "Tipe kendaraan tidak boleh kosong",
            "vehicle_type.string" => "Tipe kendaraan harus berupa string",
            "vehicle_plate.regex" => "Plat kendaraan tidak valid",
            'vehicle_plate.required' => 'Plat kendaraan tidak boleh kosong',
            "vehicle_plate.string" => "Plat kendaraan harus berupa string",
            "vehicle_plate.regex" => "Plat kendaraan tidak valid",
            "vehicle_plate.max" => "Plat kendaraan maksimal 15 karakter",
        ];
    }
}
