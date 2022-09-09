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

        Cat::factory(30)
            ->create();
        Coffee::factory(30)
            ->create();
        CatCoffee::factory(900)
            ->create();

    }
}
