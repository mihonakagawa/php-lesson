<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>新規作成</title>
</head>
<body>
  <form action="store.php" method="post">
    <!-- 新規作成② formタグのaction属性に指定したファイルに対してpostの通信を行う(データベースに対して直接POSTしている訳ではない) -->
     <!-- Q.なんでe関数はnew.phpに実装がない？　→　表示時にスクリプトが実行されるから -->
    <input type="text" name="content">
    <input type="submit" value="作成">
  </form>
  <div>
    <a href="index.php">一覧へもどる</a>
  </div>
</body>
</html>