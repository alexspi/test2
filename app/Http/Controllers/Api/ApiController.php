<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CatResource;
use App\Models\Cat;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CatRequest;

class ApiController extends Controller
{

    public function getCat(CatRequest $request)
    {
        $req = $request->all();

//        dd($req);


        $query = Cat::query();

        $query = $query->with('coffees');

        $query = $query->select('id', 'name', 'weight',
//            DB::raw('max(cat_coffee.count_cup) as cup'),
        );
        if ($request['search']) {
            $query = $query->where('name', 'like', '%'.$request['search'].'%');
        }
        if ($request['fats_min']) {
            $query = $query->where('weight', '>=', $request['fats_min']);
        }
        if ($request['fats_max']) {
            $query = $query->where('weight', '<=', $request['fats_max']);
        }


//        $query =$query->with(array('coffees' => function($query)
//        {
//            $query->max('cat_coffee.count_cup');
//        }));
//        $query = $query->whereHas('coffees', function($query) {
//            $query->max('cat_coffee.count_cup');
//        });
        $cat = $query->get()->toArray();
        dump($cat);
    }
}
