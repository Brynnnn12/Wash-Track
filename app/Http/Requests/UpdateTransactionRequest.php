<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTransactionRequest extends FormRequest
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
            'service_id' => 'required|uuid|exists:services,id',
            'transaction_date' => 'required|date',
            'payment_method' => 'required|in:cash,credit_card,bank_transfer',
            'total_price' => 'nullable|numeric|min:0', // Validasi untuk total harga
            'status' => 'required|in:pending,completed,canceled', // Validasi untuk status
        ];
    }

    /**
     * Pesan error untuk validasi.
     */
    public function messages(): array
    {
        return [

            'service_id.required' => 'ID layanan harus diisi',
            'service_id.uuid' => 'ID layanan harus berupa UUID yang valid',
            'service_id.exists' => 'ID layanan tidak ditemukan',

            'transaction_date.required' => 'Tanggal transaksi harus diisi',
            'transaction_date.date' => 'Tanggal transaksi harus berupa tanggal yang valid',

            'payment_method.required' => 'Metode pembayaran harus diisi',
            'payment_method.in' => 'Metode pembayaran tidak valid',

            'total_price.numeric' => 'Total harga harus berupa angka',
            'total_price.min' => 'Total harga tidak boleh kurang dari 0',
            'status.required' => 'Status harus diisi',
            'status.in' => 'Status tidak valid',
        ];
    }
}
