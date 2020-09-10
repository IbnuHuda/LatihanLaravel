<?php

use Illuminate\Database\Seeder;

class UsersHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\UsersHistory::class, 10)->create();
    }
}
