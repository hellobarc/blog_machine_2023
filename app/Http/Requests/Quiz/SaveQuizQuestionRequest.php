<?php

namespace App\Http\Requests\Quiz;

use Illuminate\Foundation\Http\FormRequest;

class SaveQuizQuestionRequest extends FormRequest
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
            'quiz_id' => 'required|integer',
            'question' => 'required|string',
            'question_type' => 'required|string',
            'marks' => 'nullable|string',
            'time_limit' => 'nullable|string',
            'status' => 'required|string',
        ];
    }
}
