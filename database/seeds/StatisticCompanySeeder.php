<?php

use Illuminate\Database\Seeder;

class StatisticCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\StatisticCompany::class, 10)->create();
    }
}
