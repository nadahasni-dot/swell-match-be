<?php

namespace App\Http\Requests\Booking;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookingRequest extends FormRequest
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
            'country_id' => 'required|numeric',
            'board_type_id' => 'required|numeric',
            'name' => 'required|max:100',
            'email' => 'required|email:rfc,dns|max:100',
            'whatsapp' => 'required|max:16',
            'surfing_experience' => 'required|numeric|min:0|max:10',
            'visit_date' => 'required|date',
            'id_card' => 'file|mimes:pdf,jpg,jpeg,png|max:1024',
        ];
    }
}