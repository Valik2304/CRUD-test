<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
            'cost' => 'required|int', 'price' => 'required|int', 'group' => 'required|min:1|max:255',
            ];

        if (!empty($this->product)) {
            $rules['name'][] = Rule::unique('products')->ignore($this->product->id);
        } else {
            $rules['name'][] = Rule::unique('products');
        }

        return $rules;
    }
}
