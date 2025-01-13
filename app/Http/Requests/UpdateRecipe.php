<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRecipe extends FormRequest
{

    public $rules = [
        'title' => 'required',
        'TTC' => 'required|integer',
        'COP' => 'required|integer',
        'Kcal' => 'required|integer',
        'recipe_category_id' => 'required|integer',
        'recipe_kitchen_id' => 'required|integer',
        'recipe_dish_id' => 'required|integer',
        'recipe_menu_id' => 'required|integer',
        'description' => 'required',
        'instruction' => 'required',
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
