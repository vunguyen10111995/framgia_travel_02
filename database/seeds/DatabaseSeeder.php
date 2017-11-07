<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(CommentTableSeeder::class);
        $this->call(ProvinceTableSeeder::class);
        $this->call(FollowTableSeeder::class);
        $this->call(PlanTableSeeder::class);
        $this->call(ServiceTableSeeder::class);
        $this->call(ScheduleTableSeeder::class);
        $this->call(PlanProvinceTableSeeder::class);
    }
}
