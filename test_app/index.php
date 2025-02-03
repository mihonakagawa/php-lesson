<!-- HTMLとPHPを混合して書く方法 -->
<?php
// 上記で囲むと、HTMLの文中にPHPの処理を書くことができる。
require_once('functions.php');
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Home</title>
  <link rel="styleshxeet" href="">
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
          <td><?= $todo['id']; ?></td>
          <td><?= $todo['content']; ?></td>
          <td>
            <a href="">更新</a>
          </td>
          <td>
            <form action="store.php" method="post">
              <input type="hidden" name="id" value="">
              <button type="submit">削除</button>
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>
</body>
</html>