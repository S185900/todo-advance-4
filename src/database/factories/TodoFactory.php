<?php

namespace Database\Factories;
use App\Models\Category;

use Illuminate\Database\Eloquent\Factories\Factory;

class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */


    protected $model = \App\Models\Todo::class;

    public function definition()
    {
        return [
            'category_id' => Category::inRandomOrder()->first()->id ?? 1, // ランダムなカテゴリID（なければ1を指定）
            'content' => $this->faker->realText(10), // 最大10文字のランダムなテキスト
        ];
    }

    public function category()
    {
        return $this->hasOne('App\Models\Category');
    }
    public function categories()
    {
        return $this->hasMany('App\Models\Category');
    }
}
