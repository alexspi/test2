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

        $filter = $request->all();
        $cats = Cat::query()
            ->select()
            ->with('coffees')
            ->withSum('coffees', 'calories');

        if (Arr::has($filter, 'search')) {
            $cats = $cats->where('name', 'like', '%' . $filter['search'] . '%');
        }
        if (Arr::has($filter, 'fats_min')) {
            $cats = $cats->where('weight', '>=', $filter['fats_min']);
        }
        if (Arr::has($filter, 'fats_max')) {
            $cats = $cats->where('weight', '<=', $filter['fats_max']);
        }

        $cats = $cats->get();

        return (CatResource::collection($cats))
            ->response();
    }
}
