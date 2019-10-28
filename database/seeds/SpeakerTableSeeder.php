<?php

use Illuminate\Database\Seeder;

class SpeakerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Speaker',10)->create();
    }
}
