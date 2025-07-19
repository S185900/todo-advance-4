<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;



    protected $fillable = ['content' , 'category_id'];

    public function category()
    {
        // 「1対1もしくは1対多の従属関係（BelongsTo）
        // todosテーブルに紐づくcategoryを取り出すために、モデルでbelongsTo結合を使用
        return $this->belongsTo(Category::class);
    }

    public function scopeCategorySearch($query, $category_id)
    {
        // 引数で指定した値（$category_id）が空でなかった場合、category_idカラムで検索を行う
    if (!empty($category_id)) {
        $query->where('category_id', $category_id);
    }
    }

    public function scopeKeywordSearch($query, $keyword)
    {
        // 引数で指定した値（$keyword）が空でなかった場合、contentで検索を行う
    if (!empty($keyword)) {
        $query->where('content', 'like', '%' . $keyword . '%');
    }
    }


}
