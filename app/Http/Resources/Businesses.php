<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class Businesses extends ResourceCollection
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
            'Company' => $this->Company,
            'location' => $this->location,
            'Manager' => $this->Manager,
            'Phone' => $this->Phone,
            'fax' => $this->fax,
            'website' => $this->website,

        ];
    }
}
