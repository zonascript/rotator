<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class NewsRequest extends Request
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
            'title' => 'required|min:5|max:100',
            'title_ru' => 'required|min:5|max:100',
            'text' => 'required|min:15|max:8000|',
            'text_ru' => 'required|min:15|max:8000|',
            'published_at' => 'required'
        ];
    }
}
