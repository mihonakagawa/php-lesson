<?php
require_once('connection.php');

// 新規作成④ POSTされたデータ（連装配列）を引数に受け取り、connection.phpの関数に渡している
function createData($post)
{
  createTodoData($post['content']);
  // キー名contentにしないといけないのはなぜ？
  // -- 関数の呼び出し場所（store.php）から渡ってくる引数の連想配列がキー名contentになっているから。
  // →それはなぜ？
  // -- 元々はnew.phpのinputタグのname属性と紐づいている。
}

function getTodoList()
{
    return getAllRecords();
}