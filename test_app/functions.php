<?php
require_once('connection.php');

// 新規作成④ POSTされたデータ（連装配列）を引数に受け取り、connection.phpの関数に渡している
// function createData($post)
// {
//   createTodoData($post['content']);
//   // キー名contentにしないといけないのはなぜ？
//   // -- 関数の呼び出し場所（store.php）から渡ってくる引数の連想配列がキー名contentになっているから。
//   // →それはなぜ？
//   // -- 元々はnew.phpのinputタグのname属性と紐づいている。
// }

// 一覧の取得
function getTodoList()
{
    return getAllRecords();
    // 上記関数が取得したレコード内容の配列が返ってくる
}

// 追加・更新・削除の振り分け
function savePostedData($post)
{
    $path = getRefererPath();
    switch ($path) {
        case '/new.php':
            createTodoData($post['content']);
            break;
        case '/edit.php':
            updateTodoData($post);
            break;
            
        default:
            break;
    }
}

// URLからPathを取得
function getRefererPath()
{
  $urlArray = parse_url($_SERVER['HTTP_REFERER']);
  // parse_url関数：引数に渡したURL（文字列）を分割して返してくれる
  // 今回は引数にグローバル変数$_SERVERの連想配列内のHTTP_REFERER（どこからきたか）を渡した
    return $urlArray['path'];
}