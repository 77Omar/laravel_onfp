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
        return [
            'name'=> $this->method() == 'POST' ?
                ['required', 'min:3', 'unique:products,name'] :
                ['required', 'min:3', Rule::unique('products', 'name')->ignore($this->product)], //cas ou on a un put et le champs existe deja on peut ne pas modifer pas forcement toutes les champs
            'price' => 'required|min:50|numeric',
            'description' =>['required'],
            'category' =>['sometimes', 'nullable', 'exists:categories,id'],
        ];
    }
}
