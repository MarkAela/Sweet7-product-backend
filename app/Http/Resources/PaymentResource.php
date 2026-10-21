<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'payment_id' => $this->payment_id,
            'order_id' => $this->order_id,
            'payment_method' => $this->payment_method,
            'payment_date' => $this->payment_date,
            'amount' => $this->amount,
            'payment_status' => $this->payment_status,
            'transaction_ref' => $this->transaction_ref,
        ];
    }
}
