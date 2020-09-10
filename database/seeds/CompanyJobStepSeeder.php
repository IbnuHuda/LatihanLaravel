<?php

use Illuminate\Database\Seeder;

class CompanyJobStepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\CompanyJobStep::class, 10)->create();
    }
}
