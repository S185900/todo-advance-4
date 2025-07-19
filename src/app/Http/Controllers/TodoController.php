<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;
use App\Models\Category;


class TodoController extends Controller
{
    
    public function index()
    {
        // todos = Todo::all();
        $todos = Todo::with('category')->get();
        $categories = Category::all();
        // ビューにTodoとカテゴリデータを渡す
        // compact関数を使用して、変数名と同じキーで配列を作成
        // これにより、ビューで変数名を直接使用でき

        return view('index', compact('todos', 'categories'));
    }
    public function store(TodoRequest $request)
    {
        // $todo = $request->only(['content']);
        $todo = $request->only(['content', 'category_id']);
        Todo::create($todo);

        return redirect('/')->with('message', 'Todoを作成しました');
    }
    public function update(TodoRequest $request)
    {
        $todo = $request->only(['content']);
        Todo::find($request->id)->update($todo);

        return redirect('/')->with('message', 'Todoを更新しました');
    }
    public function destroy(Request $request)
    {
        Todo::find($request->id)->delete();
        return redirect('/')->with('message', 'Todoを削除しました');
    }

    public function search(Request $request)
    {
        // 検索条件を取得
        $todos = Todo::with('category')->CategorySearch($request->category_id)->KeywordSearch($request->keyword)->get();
        $categories = Category::all();

        return view('index', compact('todos', 'categories'));
    }
}
