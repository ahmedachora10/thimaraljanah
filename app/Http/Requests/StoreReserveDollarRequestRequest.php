<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReserveDollarRequestRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'receive_place' => 'required|string',
            'destination' => 'required|string',
            'name' => 'required|string',
            'travel_type' => 'required|string',
            'travel_date' => 'required|date',
            'passport_expiry_date' => 'required|date',
            'governorate' => 'required|string',
            'phone_number' => 'required|string',
            'passport_photo' => 'required|image',
            'ticket_photo' => 'required|file',
            'card_front_photo' => 'required|file',
            'residence_card_front_photo' => 'required|file',
        ];
    }
}