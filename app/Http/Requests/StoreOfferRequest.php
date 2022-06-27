<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOfferRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'roomtype' => 'required|string|max:15',
            'residents' => 'required|integer',
            'check_in' => 'required|date',
            'check_out' => 'required|date',
            'comment' => 'required|string|max:300',
        ];
    }
}
