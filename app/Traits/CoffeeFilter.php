<?php

namespace App\Traits;

trait CoffeeFilter
{
    private function setCoffeeSearch($coffee, $search)
    {
        return $coffee->where('name', 'like', '%' . $search . '%')->orWhere('type_name', 'like', '%' . $search . '%');
    }

    private function setCalories($coffee, $calories)
    {
        return $coffee->whereBetween('calories',[$calories-20.0,$calories+20.0] );
    }

    private function setCats($coffee, $cats)
    {
        return $coffee->with('cats', function ($query) use ($cats) {
            $query->whereIn('cat_id', $cats);
        });
    }
}