<?php

use Illuminate\Database\Seeder;

class StatisticUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\StatisticUsers::class, 10)->create();
    }
}
