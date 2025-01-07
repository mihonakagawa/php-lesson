<?php
require_once('config.php');

// PDOクラスのインスタンス化
function connectPdo()
{
    try {
        return new PDO(DSN, DB_USER, DB_PASSWORD);
        // データベースを編集できる機能が備わったクラス
        // PDO::__construct() は、指定されたデータベースへの接続に失敗した場合、
        // PDO::ATTR_ERRMODE が設定されているかどうかに関わらず、PDOException をスローします。
    } catch (PDOException $e) {
        echo $e->getMessage();
        // Exception::getMessage()メソッドは、例外メッセージをstring型で返す
        exit();
    }
}

// ToDoデータの作成
function createTodoData($todoText)
{
    // 新規作成⑤ Postされたコンテンツの内容を引数に受け取り、connectPdo関数というデータベースと通信する用の関数に渡している
    $dbh = connectPdo();
    $sql = 'INSERT INTO todos (content) VALUES ("' . $todoText . '")';
    $dbh->query($sql);// PDOインスタンスのqueryメソッドは、引数に文字列を渡すと、SQLクエリとして実行するメソッド
}

// 更新処理
function updateTodoData($post)
{
    $dbh = connectPdo();
    $sql = 'UPDATE todos SET content = "' . $post['content'] . '" WHERE id = ' . $post['id'];
    $dbh->query($sql);
}

// DBに登録されているデータを取得
function getAllRecords()
{
    $dbh = connectPdo();
    $sql = 'SELECT * FROM todos WHERE deleted_at IS NULL';
    return $dbh->query($sql)->fetchAll();
}
