<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendMoneyOutRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'country' => 'required|string',
            'amount' => 'required|numeric',
            'source_of_funds' => 'required|string',
            'transaction_purpose' => 'required|string',
            'payment_method' => 'required|string',
            'account_info' => 'required|string',
            'attachment' => 'required|file',
        ];
    }
}