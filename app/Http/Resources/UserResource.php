<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
       return[
        'id'=>$this->id ,
        'fulname'=>$this->name.' '.
        $this->last_name,
        'phone'=>$this->mobile,
        'referral_user'=>$this->identifier,
        'referral_transaction'=>$this->order->referral_code ?? null,
        'instagram-name'=>$this->fbpage_name
        
        
        
       ];

    }
}
