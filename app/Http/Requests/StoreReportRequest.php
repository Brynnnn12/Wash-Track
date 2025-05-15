<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreReportRequest extends FormRequest
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
            'report_date' => 'required|date|unique:reports,report_date,NULL,id,user_id,' . Auth::id(),
        ];
    }

    public function messages(): array
    {
        return [
            'report_date.required' => 'Tanggal laporan harus diisi.',
            'report_date.date' => 'Tanggal laporan tidak valid.',
            'report_date.unique' => 'Laporan untuk tanggal ini sudah ada.',
        ];
    }
}
