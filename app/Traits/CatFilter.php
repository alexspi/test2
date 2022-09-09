<?php

namespace App\Traits;


trait CatFilter
{
    use ApiResponser;

    private function setSearch($cats, $search)
    {
        return $cats->where('name', 'like', '%' . $search . '%');
    }

    private function setFatMin($cats, $fats_min)
    {
        return $cats->where('weight', '>=', $fats_min);;
    }

    private function setFatMax($cats, $fats_max)
    {
        return $cats->where('weight', '<=', $fats_max);
    }

    private function setCofeeeTypeCoffe($cats, $coff)
    {
        return $cats->with('coffees', function ($query) use ($coff) {
            $query->whereIn('coffee_id', $coff);
        });
    }



}