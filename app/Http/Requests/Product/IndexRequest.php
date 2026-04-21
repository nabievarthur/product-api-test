<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'q' => 'nullable|string',
            'price_from' => 'nullable|numeric|min:0',
            'price_to' => 'nullable|numeric|min:0',
            'category_id' => 'nullable|exists:categories,id',
            'in_stock' => 'nullable|boolean',
            'rating_from' => 'nullable|numeric|min:0|max:5',
            'sort' => 'nullable|in:price_asc,price_desc,rating_desc,newest',
        ];
    }
}
