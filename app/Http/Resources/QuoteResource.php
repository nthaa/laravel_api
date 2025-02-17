<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuoteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    // public function toArray(Request $request): array
    public function toArray($request)
    {
        // return parent::toArray($request);
        return[
            'key' =>$this->id,
            'text' =>$this->text,
            'author' =>strtoupper($this->author),
        ];
    }
}
