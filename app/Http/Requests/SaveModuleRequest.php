<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveModuleRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'meta_keyword' => 'required|max:200',
            'meta_description' => 'required|max:10000',
            'page_title' => 'required|string|max:200',
        ];
    }
}
