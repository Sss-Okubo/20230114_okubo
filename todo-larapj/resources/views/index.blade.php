@extends('layouts.default')

<style>
  th {
    color: black;
    font-size: 1.2em;
    margin-top: 0;
  }
  
  td {
    padding: 0.6em 0.6em;
    text-align: center;
    font-size: 1.2em;
    font-family:Arial, Helvetica, sans-serif;
  }

  .add{
    display:flex;
    justify-content:space-between;
    margin-right: 2em;
  }

  .add-text input{
    font-size:100%;
    border: 1px solid;
    border-color:lightgray;
    border-radius: 4px;
    outline: none;
    width: 40rem;
    height: 3rem;
  }

  .button-add{
    font-weight:bold;
    padding: 0.5em 1em;
    background:white;
    border-radius: 4px;
    border: 2px solid rgb(206, 73, 206);
    color:rgb(206, 73, 206);
    width: 5em;
    height: 3.5em;  
  }

  .todolist{
    margin-left:1em;
    margin-top:2em;
    margin-bottom: 2em;
  }

  .todolist input{
    font-size:90%;
    border: 1px solid;
    border-color:lightgray;
    border-radius: 4px;
    outline: none;
    width: 21em;
    height: 2.2em;
}

  .button-edit{
    font-weight:bold;
    padding: 0.5em 1em;
    background:white;
    border-radius: 4px;
    border: 2px solid rgb(234, 165, 81);
    color:rgb(234, 165, 81);
    width: 5em;
    height: 3.5em;  
  }

  .button-delete{
    font-weight:bold;
    padding: 0.5em 1em;
    background:white;
    border-radius: 4px;
    border: 2px solid rgb(76, 245, 194);
    color:rgb(76, 245, 194);
    width: 5em;
    height: 3.5em;  
  }

  .error-message{
    color:red;
}
</style>

@section('title', 'Todo List')
@section('content')
<!-- エラー-->
  @error('name')
    <p class="error-message">{{$message}}</p>
  @enderror

  <!-- Todo追加-->
  <form action="/create" method="post">
    @csrf
    <div class="add">
      <div class="add-text">  
        <input type="text"  name="name" >
      </div>
      <div class="add-button">
        <button class="button-add" type="submit">追加</button>
      </div>
    </div>
  </form>
<!-- End Todo追加-->

<!-- Todo一覧-->
@if(count ($todos) > 0 )
  <table class="todolist">
    <tr>
      <th>作成日</th>
      <th>タスク名</th>
      <th>更新</th>
      <th>削除</th>
    </tr>
    @foreach ($todos as $todo)
    <tr>
      <!-- 更新日時-->
      <td>{{$todo->created_at}}</td>
      <!-- 更新-->
      <form action="/edit" method="post">
        @csrf
        <td>
          <input type="text" name="name" value="{{$todo->name}}">
          <input type="hidden" name="id" value="{{$todo->id}}">
        </td>
        <td>
          <button class="button-edit" type="submit">更新</button>
        </td>
      </form>
      <!-- End 更新-->
      <!-- 削除-->
      <form action="/delete" method="post">
        @csrf
        <td>
          <input type="hidden" name="id" value="{{$todo->id}}">
          <button class="button-delete" type="submit">削除</button>
        </td>
      </form>
      <!-- End 削除-->
    </tr>
  @endforeach
</table>
@endif
 <!-- End Todo一覧-->
@endsection