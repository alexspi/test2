<?php

namespace Database\Seeders;

use App\Models\Cat;
use App\Models\Coffee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cat::factory()
            ->count(20)
            ->hasAttached(Coffee::factory()->count(30))
            ->create();
    }
}
