<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    use HasFactory;

    public function coffees()
    {
        return $this->belongsToMany(Coffee::class)->withPivot('count_cup');
    }

    public function favorite($id)
    {
        $cats = $this->where('id',$id)->with('coffees')->get()->toArray();

        foreach ($cats->flatMap->coffees as $coffee) {
            echo $coffee->cup->count_cup;
        }
    }

    public function filterCats($value)
    {
        return $this->coffees()->wherePivot('count_cup', $value);
    }
}
