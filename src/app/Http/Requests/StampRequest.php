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
            'content' => ['required', 'string', 'max:191'],
            'submit' => ['required'],
        ];
    }

    public function messages() {
        return [
        "content.required" => "内容を表示してください。",
        "content.string" => "内容を文字列で表示してください。",
        "content.max" => "191文字以下で表示してください",
        "submit.required" => "送信ボタンを押してください。",
        ];
    }
}
