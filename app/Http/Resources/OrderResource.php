<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'order_id' => $this->order_id,
            'customer_id' => $this->customer_id,
            'total_amount' => $this->total_amount,
            'order_status' => $this->order_status,
        ];
    }
}
