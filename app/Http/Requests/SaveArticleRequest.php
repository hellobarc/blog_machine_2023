<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveArticleRequest extends FormRequest
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
            'title'             => 'required|string|max:100',
            // 'category_id'       => 'required|integer',
            'meta_keyword'      => 'required|max:200',
            'meta_description'  => 'required|max:10000',
            'page_title'        => 'required|string|max:200',
            'thumbnail'         => 'required|image|mimes:jpeg,jpg,png',
            'custom_date'       => 'required|date',
            'author_id'         => 'required|integer',
            'is_featured'       => 'required|integer',
            'is_premium'        => 'required|integer',
            'tags'              => 'nullable|string|max:500',
            'read_minutes'      => 'required|string|max:500',
            'references'        => 'nullable|min: 10',
            'co_authors'        => 'nullable|integer',
            'secondary_categories' => 'nullable|string',
            'hits'              => 'nullable|integer',
            'smily_yes'         => 'nullable|integer',
            'smily_no'          => 'nullable|integer',
        ];
    }
}
