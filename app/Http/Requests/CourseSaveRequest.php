<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CourseSaveRequest extends Request
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
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|max:2000|dimensions:min_width=100,min_height=100|dimensions:max_width=2000,max_height=2000'
        ];
    }
}
