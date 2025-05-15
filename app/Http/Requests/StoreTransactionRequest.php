<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransactionRequest extends FormRequest
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
            //
            'customer_id' => 'required|uuid|exists:customers,id',
            'service_id' => 'required|uuid|exists:services,id',
            'transaction_date' => 'required|date',
            'total_price' => 'required|numeric|min:0',
            'payment_method' => 'required|in:cash,credit_card,bank_transfer',
        ];
    }
    /**
     * Pesan error untuk validasi
     */
    public function messages(): array
    {
        return [
            'customer_id.required' => 'ID pelanggan harus diisi',
            'customer_id.uuid' => 'ID pelanggan harus berupa UUID yang valid',
            'customer_id.exists' => 'ID pelanggan tidak ditemukan',
            'service_id.required' => 'ID layanan harus diisi',
            'service_id.uuid' => 'ID layanan harus berupa UUID yang valid',
            'service_id.exists' => 'ID layanan tidak ditemukan',
            'transaction_date.required' => 'Tanggal transaksi harus diisi',
            'transaction_date.date' => 'Tanggal transaksi harus berupa tanggal yang valid',
            'total_price.required' => 'Total harga harus diisi',
            'total_price.numeric' => 'Total harga harus berupa angka',
            'total_price.min' => 'Total harga tidak boleh kurang dari 0',
            'payment_method.required' => 'Metode pembayaran harus diisi',
            'payment_method.in' => 'Metode pembayaran tidak valid',
        ];
    }
}
