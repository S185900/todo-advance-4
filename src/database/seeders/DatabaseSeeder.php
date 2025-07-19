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
        // Call the TodosTableSeeder to seed the todos table
        $this->call(TodosTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);

        // You can add more seeders here if needed
        // $this->call(AnotherSeeder::class);
    }
}
