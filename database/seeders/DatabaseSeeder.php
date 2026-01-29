<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * Only admin is seeded; users and managers are created via application.
     */
    public function run(): void
    {
        $this->call(AdminSeeder::class);
    }
}
