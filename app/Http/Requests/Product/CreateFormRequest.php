<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreateFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
            'price' => 'required',
            'category_id' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập tên',
            'description.required' => 'Vui lòng nhập mô tả',
            'image.required' => 'Vui lòng chọn hình ảnh',
            'price.required' => 'Vui lòng nhập giá hợp lệ',
            'category_id.required' => 'Vui lòng chọn danh mục',
        ];
    }
}
