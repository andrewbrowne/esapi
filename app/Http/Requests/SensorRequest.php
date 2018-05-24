<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SensorRequest extends FormRequest
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
            'sensor' => 'required|string|unique:sensors',
            'min' => 'required|integer',
            'max' => 'required|integer',
            'site_id' => 'required|integer',
            'input_id' => 'required|integer',
            'location_id' => 'required|integer'
        ];
    }
}