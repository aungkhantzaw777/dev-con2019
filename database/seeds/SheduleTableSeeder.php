<?php

use Illuminate\Database\Seeder;

class SheduleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Shedule',10)->create();
    }
}
