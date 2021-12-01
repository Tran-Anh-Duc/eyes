<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
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
            "name"=>"required | max:20 | min:5",
        ];
    }

    public function messages()
    {
        return[
            'name.required'=>'danh mục không để trống',
            'name.min'=>'danh mục không được it hơn 5 ký tự',
            'name.max'=>'danh mục không được it hơn 20 ký tự',
        ];

    }
}