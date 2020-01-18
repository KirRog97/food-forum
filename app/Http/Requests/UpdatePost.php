<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePost extends FormRequest
{

    public $rules = [
        'title'             =>   'required',
        'TTC'               =>   'required|integer',
        'COP'               =>   'required|integer',
        'Kcal'              =>   'required|integer',
        'post_category_id'  =>   'required|integer',
        'post_kitchen_id'   =>   'required|integer',
        'post_dish_id'      =>   'required|integer',
        'post_menu_id'      =>   'required|integer',
        'description'       =>   'required',
        'instruction'       =>   'required',
    ];

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
        return $this->rules;
    }
}
