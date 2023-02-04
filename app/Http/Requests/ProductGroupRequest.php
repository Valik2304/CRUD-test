<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductGroupRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'name' => ['required', 'min:3', 'max:255'],
            'temp' => 'required|min:1|max:255',
        ];

        if (!empty($this->group)) {
            $rules['name'][] = Rule::unique('product_groups')->ignore($this->group->id);
        } else {
            $rules['name'][] = Rule::unique('product_groups');
        }

        return $rules;
    }
}
