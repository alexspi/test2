<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CatResource;
use App\Models\Cat;
use App\Models\CatCoffee;
use App\Models\Coffee;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CatRequest;

class ApiController extends Controller
{

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getCat(Request $request)
    {
//        dd($request->all());
        $filter = $request->all();
//        dump($filter);
        $cats = Cat::query()
            ->select()
//            ->favorite();
            ->with('coffees')
            ->withSum('coffees', 'calories')
       ;

        $cats = $cats->get()->toArray();

        return (new CatResource($filter))
            ->response();
    }
}
