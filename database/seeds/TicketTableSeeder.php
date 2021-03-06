<?php

use Illuminate\Database\Seeder;

class TicketTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Ticket', 1000)->create(['sale_online' => 0]);
        factory('App\Ticket', 400)->create(['sale_online' => 1]);
    }
}
