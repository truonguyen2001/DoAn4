<?php

namespace App\Http\Resources;

use App\Models\Invoice;
use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'customer_id' => $this->customer_id,
            'phone_number' => $this->phone_number,
            'customer_name' => $this->customer_name,
            "status_name" => Invoice::getStatusName($this->status),
            'address' => $this->address,
            'customer' => new CustomerResource($this->whenLoaded('customer')),
            'total' => $this->total,
            'paid' => $this->paid,
            'created_at' => date('d/m/Y', strtotime($this->created_at)),
            'updated_at' => $this->updated_at,
            'details' => InvoiceDetailResource::collection($this->whenLoaded('details'))
        ];
    }
}
