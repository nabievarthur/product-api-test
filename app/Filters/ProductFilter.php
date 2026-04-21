<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends AbstractFilter
{
    protected array $filters = [
        'q',
        'price_from',
        'price_to',
        'category_id',
        'in_stock',
        'rating_from',
        'sort',
    ];

    protected function q(Builder $builder, $value)
    {
        $builder->where('name', 'like', "%{$value}%");
    }
    protected function priceFrom(Builder $builder, $value){
        $builder->where('price', '>=', $value);
    }
    protected function priceTo(Builder $builder, $value){
        $builder->where('price', '<=', $value);
    }
    protected function categoryId(Builder $builder, $value)
    {
        $builder->where('category_id', $value);
    }
    protected function inStock(Builder $builder, $value){
        $builder->where('in_stock', $value);
    }
    protected function ratingFrom(Builder $builder, $value){
        $builder->where('rating', '>=', $value);
    }

    protected function sort(Builder $builder, $value){
        return match ($value) {
            'price_asc' => $builder->orderBy('price', 'asc'),
            'price_desc' => $builder->orderBy('price', 'desc'),
            'rating_desc' => $builder->orderBy('rating', 'desc'),
            'newest' => $builder->orderBy('created_at', 'desc'),
            default => $builder
        };
    }
}
