<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminSaveRequest extends Request
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
            'email' => 'required|email',
            'number' => 'required|numeric',
            'image' => 'required|image|dimensions:min_width=10,min_height=10|dimensions:max_width=2000,max_height=2000'
        ];
    }
}
