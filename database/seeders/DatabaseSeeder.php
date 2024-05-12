<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        \App\Models\Category::factory(10)->create();
    }
}
