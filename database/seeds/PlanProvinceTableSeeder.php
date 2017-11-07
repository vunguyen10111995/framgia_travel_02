<?php

use App\Models\PlanProvince;
use Illuminate\Database\Seeder;

class PlanProvinceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PlanProvince::class, 5)->create();
    }
}
