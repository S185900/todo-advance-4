<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;



class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Category1'],
            ['name' => 'Category2'],
            ['name' => 'Category3'],
            ['categories_id' => 1],
            ['categories_id' => 2],
            ['categories_id' => 3],

        ];

        Category::insert($categories);
    }
}

     *
     * @return void
     */
    public function run()
    {
        //
    }
}
