<?php

namespace Database\Seeders;

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
         \App\Models\User::factory(10)->create();
         \App\Models\Customer::factory(10)->create();
         \App\Models\Company::factory(10)->create();
        //  $this->call('seedername::class'); you cas addthis to call seeder files or use facvrory here c:
    }
}
