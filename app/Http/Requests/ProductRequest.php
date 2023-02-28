<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'name' => ['required'],
            'price' => ['required', 'integer', 'min:0'],
            'quantity' => ['required', 'integer', 'min:0'],
            'discount' => ['nullable', 'integer', 'between:0,100'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'نام محصول الزامیست',
            'price.required' => 'قیمت محصول الزامیست',
            'price.integer' => 'قیمت محصول باید به صورت عدد باشد',
            'price.min' => 'قیمت محصول باید بیشتر از ۰ باشد',
            'quantity.required' => 'تعداد محصول الزامیست',
            'quantity.integer' => 'تعداد محصول باید به صورت عدد باشد',
            'quantity.min' => 'تعداد محصول باید بیشتر از ۰ باشد',
            'discount.integer' => 'تخفیف قیمت باید به صورت عدد باشد',
            'discount.min' => 'تخفیف قیمت باید بین ۰ و ۱۰۰ باشد',
        ];
    }
}
