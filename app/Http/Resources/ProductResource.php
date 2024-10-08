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
            "product_id" => $this->id,
            "name" => $this->name,
            "brand_name" => $this->brand->name,
            "actual_price" => $this->actual_price,
            "sale_price" => $this->sale_price,
            "total_stock" => $this->total_stock,
            "unit" => $this->unit,
            "more_information" => $this->more_information,
            "photo" => $this->photo
        ];
    }
}
