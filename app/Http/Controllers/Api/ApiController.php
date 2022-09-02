<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CatResource;
use App\Models\Cat;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ApiController extends Controller
{

    public function getCat()
    {
        $query = Cat::query();

        $query = $query->with('coffees');

        $query = $query->where('name', 'like', '%11%');

        $query =$query->with(array('coffees' => function($query)
        {
            $query->max('cat_coffee.count_cup');
        }));
//        $query = $query->whereHas('coffees', function($query) {
//            $query->max('cat_coffee.count_cup');
//        });
        $cat = $query->get()->toArray();
        dump($cat);
    }
}
