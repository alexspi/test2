<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CoffeeRequest;
use App\Http\Resources\CatResource;
use App\Http\Resources\CoffeeResource;
use App\Models\Cat;
use App\Models\Coffee;
use App\Traits\CatFilter;
use App\Traits\CoffeeFilter;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Http\Requests\CatRequest;

class ApiController extends AppBaseController
{
    use CatFilter,CoffeeFilter;

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getCat(CatRequest $request): JsonResponse
    {
        $request->validated();

        $filter = $request->all();

        $cats = Cat::query()
            ->select()
            ->withSum('coffees', 'calories');

        if (count($filter) !== 0) {

            if (Arr::has($filter, 'search')) {
                $cats = $this->setSearch($cats, $filter['search']);
            }
            if (Arr::has($filter, 'fats_min')) {

                $cats = $this->setFatMin($cats, $filter['fats_min']);

            }
            if (Arr::has($filter, 'fats_max')) {
                $cats = $this->setFatMax($cats, $filter['fats_max']);
            }
            if (Arr::has($filter, ['coffee', 'coffee_type'])) {

                $coff = Coffee::getNameTypeId($filter['coffee_type'],$filter['coffee']);

                if (count($coff) == 0) {
                    return $this->errorResponse('Такого сочетания кофе и типа кофе нет', '404');
                }
                $cats = $this->setCofeeeTypeCoffe($cats, $coff);

            } elseif (Arr::has($filter, 'coffee')) {

                $coff = Coffee::getNameId($filter['coffee']);

                $cats = $this->setCofeeeTypeCoffe($cats, $coff);

            } elseif (Arr::has($filter, 'coffee_type')) {
                $coff = Coffee::getTypeId($filter['coffee_type']);

                $cats = $this->setCofeeeTypeCoffe($cats, $coff);
            }
        }

        $cats = $cats->get();

        return $this->successResponse(CatResource::collection($cats));

    }


    public function getCoffee(CoffeeRequest $request)
    {

        $request->validated();

        $filter = $request->all();



        $coffee = Coffee::query()
            ->select();

        if (Arr::has($filter, 'search')) {
            $coffee = $this->setCoffeeSearch($coffee, $filter['search']);
        }
        if (Arr::has($filter, 'fats_min')) {

            $coffee = $this->setCalories($coffee, $filter['callories']);

        }
        if (Arr::has($filter, 'cats')) {

            $items = explode(',', $filter['cats']);
            $cats = Cat::whereIn('name', $items)->pluck('id')->toArray();

            $coffee = $this->setCats($coffee, $cats);

        }

        $coffee = $coffee->get();

        return  $this->successResponse(CoffeeResource::collection($coffee));
    }

}
