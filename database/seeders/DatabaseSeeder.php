<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Cat;
use App\Models\CatCoffee;
use App\Models\Coffee;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        for ($i = 1; $i <= 30; $i++) {
//            Cat::factory()
//                ->hasAttached(Coffee::factory(rand(1, 5)),
//                    ['count_cup' => rand(1, 10)])
//                ->create();
//        }

        Cat::factory(30)
            ->create();
        Coffee::factory(20)
            ->create();
        CatCoffee::factory(100)
            ->create();

    }
}
