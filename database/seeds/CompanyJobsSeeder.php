<?php

use Illuminate\Database\Seeder;

class CompanyJobsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\CompanyJobs::class, 10)->create();
    }
}
