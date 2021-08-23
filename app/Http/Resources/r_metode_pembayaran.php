<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class r_metode_pembayaran extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
