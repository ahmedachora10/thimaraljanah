<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreModifyTransferRequestRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'currency' => 'required|string',
            'recipient_name' => 'required|string',
            'sender_name' => 'required|string',
            'recipient_phone_number' => 'required|string',
            'sender_phone_number' => 'required|string',
            'location' => 'required|string',
            // 'service_provider' => 'required|string',
            // 'transfer_number' => 'nullable|string',
            'amount' => 'required|numeric',
            'transaction_purpose' => 'required|string',
            'passport' => 'required|file',
        ];
    }
}