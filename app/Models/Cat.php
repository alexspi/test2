<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    use HasFactory;

    public function coffees()
    {
        return $this->belongsToMany(Coffee::class)
            ->using(CatCoffee::class);
    }

    public function favorite($id)
    {
        $arr = $this->with('coffees')->find($id)->toArray();
        $c = array_count_values(array_column($arr['coffees'], 'id'));
        $val = array_search(max($c), $c);
        $coffe = Coffee::select('type_name')->find($val);
        return $coffe->type_name;
    }


}
