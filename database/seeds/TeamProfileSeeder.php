<?php

use Illuminate\Database\Seeder;

class TeamProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\TeamProfile::class, 1)->create();
    }
}
