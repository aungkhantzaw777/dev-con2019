<?php

use Illuminate\Database\Seeder;

class SponserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Sponser', 6)->create();
    }
}
