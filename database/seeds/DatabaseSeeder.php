<?php

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
        $this->call(UserTableSeeder::class);
        $this->call(TicketTableSeeder::class);
        $this->call(SpeakerTableSeeder::class);
        $this->call(SponserTableSeeder::class);
    }
}
