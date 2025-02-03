<?php
require_once('config.php');

// PDOクラスのインスタンス化
function connectPdo()
{
    try { // 例外処理の際に使う構文
        // 例外を発生させる処理が書いていない理由
            // 
        // catchの引数がExceptionではなくPDOExceptionという別のクラスになっている理由
            // 
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
    // PDOStatementインスタンスのfetchAllメソッドは、
    // 結果セットに残っている全ての行を含む配列を返します。
    // この配列は、カラム値の配列もしくは各カラム名に対応するプロパティを持つオブジェクトとして各行を表します。
    // 取得結果がゼロ件だった場合は空の配列を返します。
}

// ページ更新を押した時にそのページの情報だけ取ってくる
function getTodoTextById($id)
{
    $dbh = connectPdo();
    $sql = "SELECT * FROM todos WHERE deleted_at IS NULL AND id = $id";
    $data = $dbh->query($sql)->fetch();
    return $data['content'];
}

function deleteTodoData($id)
{
    $dbh = connectPdo();
    $now = date('Y-m-d H:i:s');
    /*
    ここの処理を考えて記述してください。
    */
    $sql = "UPDATE todos SET deleted_at = :now WHERE deleted_at IS NULL AND id = :id";
    // $dbh->query($sql);
    $statement = $dbh->prepare($sql);
    // PDO::prepare() ・・・文を実行する準備を行い、文オブジェクト(PDOStatement)を返す
    $statement->bindValue('id', $id, PDO::PARAM_INT);
    $statement->bindValue('now', $now, PDO::PARAM_STR);
    // PDOStatement::bindValue() ・・・プレースホルダーと数値の紐付け。返り値はbool
    $statement->execute();
}