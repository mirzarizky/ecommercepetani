<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if ($this->isMethod('post')) {
            return [
                'user_id' => 'required',
                'category_id' => 'required',
                'image' => 'required|image|max:1024',
                'name' => 'required|max:255',
                'price' => 'required|numeric',
                'unit' => 'required',
                'description' => 'required',
                'is_stock' => 'nullable',
            ];
        } else {
            return [
                'user_id' => 'required',
                'category_id' => 'required',
                'image' => 'nullable|image|max:1024',
                'name' => 'required|max:255',
                'price' => 'required|numeric',
                'unit' => 'required',
                'description' => 'required',
                'is_stock' => 'nullable',
            ];
        }
    }
}
