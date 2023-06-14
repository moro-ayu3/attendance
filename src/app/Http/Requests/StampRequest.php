<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StampRequest extends FormRequest
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
            'submit' => ['required'],
        ];
    }

    public function messages() {
        return [
        "submit.required" => "送信ボタンを押してください。",
        ];
    }
}
