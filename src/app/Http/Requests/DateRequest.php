<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DateRequest extends FormRequest
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
            'date' => ['required'],
            'name' => ['required'],
            'time' => ['required'],
        ];
    }

    public function messages() {
        return [
        "date.required" => "日付を表示してください。",
        "name.required" => "名前を表示してください。",
        "time.required" => "時間を表示してください",
        ];
    }
}
