<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoomRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'type' => 'required|string|unique:rooms,type',
            'persons' => 'required|string|max:20',
            'beds' => 'required|string|max:20',
            'area' => 'required|int',
            'price' => 'required|int',
        ];
    }
}
