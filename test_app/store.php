<?php
// 新規作成③ postされたデータを使って、createData関数を呼び出している -->

require_once('functions.php');
// require_once()は何のために記述している?
// -- ファイルの読み込みのために記述している。
// -- 引数にファイル名を記載することで、そのファイルに記載している変数や関数を呼び出すことができる。

// var_dump($_POST);
// exit;

createData($_POST);
// $_POSTには何が入っているか？
// -- POSTされたデータ。
// -- データ型：　Array。連想配列。
// -- inputタグのname属性がキーとなりvalue属性がバリューとなるような連想配列

header('Location: ./index.php'); // PHPの header関数でリダイレクト先を指定