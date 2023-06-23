<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestRequest extends FormRequest
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
            'rest_start_time' => ['required'],
            'rest_end_time' => ['required'],
        ];
    }

    public function messages()
     {
         return [
             'rest_start_time.required' => '休憩開始を打刻してください',
             'rest_end_time.required' => '休憩終了を打刻してください',
         ];
     }
}

