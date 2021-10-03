<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResoure extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'uuid' => $this->uuid,
            'code' => $this->code,
            'description' => $this->description,
            'full_description' => $this->full_description,
            'date' => $this->date,
            'price' => $this->price,
            'current_account' => $this->current_account,
            'by_admin' => $this->by_admin,
            'status' => $this->status,
            'document_number' => $this->document_number,
            'document_batch' => $this->document_batch,
            'document_protocol' => $this->document_protocol,
            'account_id' => $this->account_id,
        ];
    }
}
