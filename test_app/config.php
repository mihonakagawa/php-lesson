<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
set_error_handler('errorHandler');
function errorHandler($errNo, $errStr, $errFile, $errLine)
{
    if ($errNo === E_NOTICE || $errNo === E_WARNING) {
        $errTitle = $errNo === E_NOTICE ? 'Notice' : 'Warning';
        $escapedErrStr = htmlspecialchars($errStr);
        $escapedErrFile = htmlspecialchars($errFile);

        echo '<b>' . $errTitle . '</b>: ' . $escapedErrStr . ' in <b>' . $escapedErrFile . '</b> on line <b>' . $errLine . '</b>';
        exit;
    }

    return false;
}

// PDOクラスを使って、PDO接続
// DBからデータを取得したり、データを保存、更新・編集
// define(定数名, 定数の値): 定数を定義するメソッド。
// ※クラスの中ではdefine()は記述することができない。
// ※クラス内で定数を定義する場合、代わりにconstというオブジェクト定数によって定義する。
define('DSN', 'mysql:dbname=php_lesson;host=localhost;unix_socket=/tmp/mysql.sock');
define('DB_USER', 'root');
define('DB_PASSWORD', '872DkfKyo583'); // 第二引数: MySQLのパスワード

// echo DB_USER; //確認用
// 出力結果： 'root'