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
        $filter = $request->all();
        $cats = Cat::query()
            ->select()
            ->with('coffees')
            ->withSum('coffees', 'calories')
        ;

        if (Arr::has($filter, 'search')) {
            $cats = $cats->where('cats.name', 'like', '%' . $filter['search'] . '%');
        }
        if (Arr::has($filter, 'fats_min')) {
            $cats = $cats->where('cats.weight', '>=', $filter['fats_min']);
        }
        if (Arr::has($filter, 'fats_max')) {
            $cats = $cats->where('cats.weight', '<=', $filter['fats_max']);
        }

        $cats = $cats->get();
        $grades = [];
        foreach ($cats as $grade) {
            $grades[] = array(
                'id' => $grade->id,
                'name' => $grade->name,
                'weight' => $grade->weight,
                 'favorite_coffee' => $grade->favorite($grade->id),
                'callories' => $grade->coffees_sum_calories

            );
        }
        return $grades;

    }
}
