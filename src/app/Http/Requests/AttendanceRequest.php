<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttendanceRequest extends FormRequest
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
            'work_start_time' => ['required'],
            'work_end_time' => ['required'],
        ];
    }

     public function messages()
     {
         return [
             'work_start_time.required' => '勤務開始を打刻してください',
             'work_end_time.required' => '勤務終了を打刻してください',
         ];
     }
}
