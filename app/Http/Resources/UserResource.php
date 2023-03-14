<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Level;
class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */


     public function __toString()
     {
         return $this->toJson();
     }
 
 
    public function toArray($request)
    {

        
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'level_id'   => $this->level_id,
            'Level'=>level::where("id",$this->level_id)->pluck("name")->first(),
    ];
    }

}
