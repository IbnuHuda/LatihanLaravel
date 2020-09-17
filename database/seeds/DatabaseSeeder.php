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
        $this->call([
            TeamProfileSeeder::class,
            UsersSeeder::class,
        	UserCompanySeeder::class,
            // UsersProfileSeeder::class,
            CompanyProfileSeeder::class,
            // CompanyJobsSeeder::class,
            // CompanyJobStepSeeder::class,
            // UsersJobRegisteredSeeder::class,
            // UsersHistorySeeder::class,
            // StatisticUsersSeeder::class,
            // StatisticCompanySeeder::class,
            // RatingSeeder::class,
        ]);
    }
}
