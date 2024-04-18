<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $packages_name = [];

        if(isset($this->order->packages))
        {
            foreach($this->order->packages as $package)
            {
                $packages_name[] = $package->title;
            }
        }
       return [
            
            'transaction_id'=>$this->id,
            'statuse'=>$this->status,
            'user_name'=>$this->order->user->name ?? null ,
            'user_lastname'=>$this->order->user->lastname ?? null,
            'phone'=>$this->order->user->mobile ?? null,
            'creation'=>$this->creation_date,
            'amount'=>$this->amount,
             'referral_user'=>$this->order->user->identifier_code ?? null,
             'referral_transaction'=>$this->order->referral_code?? null ,
            'package_name'=>$packages_name

        ];
    

    }
}
