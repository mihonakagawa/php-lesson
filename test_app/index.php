<?php
// HTMLとPHPを混合して書く方法
// 上記で囲むと、HTMLの文中にPHPの処理を書くことができる。
require_once('functions.php');

// XSS攻撃：

// header('Set-Cookie: userId=123'); // index.phpアクセス時にuserIdを生成する仕様とします。(今回はuserIdを静的に書いていますが本来は動的に生成されます。)

// header('Set-Cookie: name=value; Secure; Path=/; SameSite=None; Partitioned;'); // クッキーを設定する
// → こうすることで、index.phpを開くたびにブラウザに「今ならアンケートで1万円GET」のアラートが表示される

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Home</title>
  <link rel="stylesheet" href="">
</head>
<body>
  welcome hello world
  <div>
    <a href="new.php">
      <!-- 新規作成① リンククリックすると新規作成の画面に遷移する -->
      <p>新規作成</p>
    </a>
  </div>
  <div>
    <table>
      <tr>
        <th>ID</th>
        <th>内容</th>
        <th>更新</th>
        <th>削除</th>
      </tr>
      <!-- foreachの後{}が省略できる -->
      <?php foreach (getTodoList() as $todo): ?>
        <tr>
          <!-- ↓ echo の省略形。'<?php echo $todo['id']; ?>'と同じ意味 -->
          <td><?= e($todo['id']); ?></td>
          <td><?= e($todo['content']); ?></td>
          <td>
            <!--  ? 以下:クエリパラメータ。edit.phpに遷移し、かつクエリパラメータのデータをGETでedit.phpに送ることができる。 -->
            <!-- GET・POSTの違いは？ -->
            <a href="edit.php?id=<?= e($todo['id']); ?>">更新</a>
          </td>
          <td>
            <form action="store.php" method="post">
              <input type="hidden" name="id" value="<?= e($todo['id']); ?>">
              <!-- なぜidにもエスケープ処理（e関数）を入れる？ -->
              <button type="submit">削除</button>
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>
</body>
</html>