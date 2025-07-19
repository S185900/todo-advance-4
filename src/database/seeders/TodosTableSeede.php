<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Todo;
use App\Models\Category;

class TodosTableSeede extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'category1', // 必須フィールドに値を追加
            'updated_at' => now(),
            'created_at' => now(),
        ]);
    }
}
