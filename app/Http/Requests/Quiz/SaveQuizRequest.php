<?php

namespace App\Http\Requests\Quiz;

use Illuminate\Foundation\Http\FormRequest;

class SaveQuizRequest extends FormRequest
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
            'article_id' => 'required|integer',
            'article_content_id' => 'required|integer',
            'quiz_type' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'question_type' => 'required|string',
            'status' => 'required|string',
        ];
    }
}
