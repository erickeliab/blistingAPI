<?php

namespace App\Http\Resources;
use App\Http\Resources\BusinessResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class Users extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'name' => $this->name,
            'sirname' => $this->sirname,
            'email' => $this->email,
            'businesses' => BusinessResource::collection($this->businesses),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
           
        ];
    }
}
