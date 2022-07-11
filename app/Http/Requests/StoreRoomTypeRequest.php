<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoomTypeRequest extends FormRequest
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
            'type' => 'required|unique:roomtypes,type,',
            'persons' => 'required|numeric',
            'beds' => 'required|string|max:30',
            'description' => 'required|string|max:250',
            'price' => 'required|string',
            'room_id' => 'required|numeric',
        ];
    }
}