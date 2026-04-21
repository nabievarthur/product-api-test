<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'category_id' => $this->category_id,
            'in_stock' => $this->in_stock,
            'rating' => $this->rating,
            'category' => CategoryResource::make($this->whenLoaded('category')),
            'in_stock_text' => $this->in_stock ? 'В наличии' : 'Нет в наличии',
        ];
    }
}
