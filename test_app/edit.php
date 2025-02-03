<?php
require_once('functions.php');
// var_dump($_GET);
// exit;
// $_GETには、key名'id'を持つデータの入った配列が入っている。
$todo = getSelectedTodo($_GET['id']);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>編集</title>
</head>
<body>
  <form action="store.php" method="post">
    <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
    <input type="text" name="content" value="<?= $todo ?>">
    <input type="submit" value="更新">
  </form>
  <div>
    <a href="index.php">一覧へもどる</a>
  </div>
</body>
</html>