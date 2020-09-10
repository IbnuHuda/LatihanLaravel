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
        factory(App\User::class, 10)->create();

        $this->call([
            TeamProfileSeeder::class,
        	UserCompanySeeder::class,
            UsersProfileSeeder::class,
            CompanyProfileSeeder::class,
            CompanyJobsSeeder::class,
            CompanyJobStepSeeder::class,
            UsersJobRegisteredSeeder::class,
            UsersHistorySeeder::class,
            StatisticUsersSeeder::class,
            StatisticCompanySeeder::class,
            RatingSeeder::class,
        ]);
    }
}
