<?php

namespace App\Http\Resources;

use App\Models\Cat;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class CatResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'name' => $this->name,
            'weight' => $this->weight,
            'favorite_coffee' => $this->favorite($this->id),
            'callories' => $this->coffees_sum_calories
        ];

    }
}
