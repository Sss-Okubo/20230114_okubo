<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
  public function index()
  {
    $todos = Todo::all(); // todosテーブルから全件取得
    return view('index', ['todos' => $todos]); //$todosに代入してViewを呼び出す
  }
    
  public function create(TodoRequest $request)
  {
    $form = $request->all();// 画面リクエストを$formに格納
    Todo::create($form);// createメソッドで登録
    return redirect('/');
  }
  public function edit(TodoRequest $request)
  {
    $form = $request->all(); //画面リクエストを$formに格納
    unset($form['_token']); //不要なトークンを削除
    Todo::where('id', $request->id)->update($form);//Updateメソッドで更新
    return redirect('/');// リダイレクト
  }

  public function delete(Request $request)
  {
    Todo::find($request->id)->delete();//deleteメソッドで削除
    return redirect('/');//リダイレクト
  }
}
