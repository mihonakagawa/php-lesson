-- server start
mysql.server restart

-- login
mysql -u root -p

-- Pass
8..D..K..5..

-- ログイン
USE php_lesson;

-- テーブル作成
CREATE TABLE `todos` (
`id` MEDIUMINT NOT NULL AUTO_INCREMENT,
`content` VARCHAR(255),
`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
`updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`deleted_at` DATETIME NULL DEFAULT NULL,
PRIMARY KEY(`id`)
);

-- phpのコマンドでビルトインサーバーを開く
-- 作業しているディレクトリに移動した上で、
-- php -S localhost:9999
-- サーバーを閉じるとき： Ctrl+C 



-- ------------------------------------------------------
-- DBにログインできなくなった時
-- # mysql関係の動いているプロセスを確認
ps aux | grep mysql

-- [ユーザー名]        67190   2.4  1.0  4714368 168472   ??  S     1:25PM   0:00.36 /usr/local/opt/mysql@5.7/bin/mysqld --basedir=/usr/local/opt/mysql@5.7 --datadir=/usr/local/var/mysql --plugin-dir=/usr/local/opt/mysql@5.7/lib/plugin --log-error=[マシン名].local.err --pid-file=[マシン名].local.pid
-- _mysql            5690   0.0  0.1  4896376  24236   ??  S    月11AM   4:42.62 /usr/local/Cellar/mysql/8.0.22/bin/mysqld --basedir=/usr/local/Cellar/mysql/8.0.22 --datadir=/usr/local/var/mysql --plugin-dir=/usr/local/Cellar/mysql/8.0.22/lib/plugin --user=mysql --log-error=[マシン名].local.err --pid-file=/usr/local/var/mysql/[マシン名].local.pid
-- root              5578   0.0  0.0  4281288    128   ??  S    月11AM   0:00.03 /bin/sh /usr/local/Cellar/mysql/8.0.22/bin/mysqld_safe --datadir=/usr/local/var/mysql --pid-file=/usr/local/var/mysql/[マシン名].local.pid
-- [ユーザー名]        67192   0.0  0.0  4268424    696 s004  S+    1:25PM   0:00.00 grep --color=auto mysql
-- [ユーザー名]        67103   0.0  0.0  4284252   1180   ??  S     1:25PM   0:00.03 /bin/sh /usr/local/opt/mysql@5.7/bin/mysqld_safe --datadir=/usr/local/var/mysql

-- # grep以外のプロセスをkillする
sudo kill -TERM 11111
-- 11111の部分はプロセスIDを入力する

-- # 接続できるか確認する
mysql -u root
-- -------------------------------------------------------

-- PHPビルトインサーバーの起動
php -S localhost:9999

-- 起動した上で、localhostのURLを開く
http://localhost:9999/

-- 復習問題 -------------------------------------------------------
-- Q1
-- require_once()は何のために記述しているか説明してください。
-- -- ファイルの読み込みのために記述している。
-- -- 引数にファイル名を記載することで、そのファイルに記載している変数や関数を呼び出すことができる。

-- Q2
-- connectPdo() の返り値は何か、またこの記述は何をするための記述か説明してください。
-- -- PDOクラスから作られたインスタンス（オブジェクト）。
-- -- 指定のデータベースに接続を試み、成功時はオブジェクトを返し、失敗時は例外メッセージを受け取るための記述。
-- -- PDOクラス： PHP とデータベースサーバーの間の接続を行える機能を備えたクラス。

-- Q3
-- try catchとは何か説明してください。
-- -- 例外処理を行う時に使用する構文。
-- -- 例外とは？： 特定の条件が揃った時にしか発生しないエラーのこと。
-- -- tryの中には、まずは例外が発生する可能性がある処理をを記載する。
-- -- 例外を発生させるためには、throwというキーワードに続いてExceptionというクラスをインスタンス化する。
-- -- catchの中には、throwで例外を発生させた時の処理を記載する。
-- -- throw new Exceptionで例外を発生させると、catch (Exception $e) {  }の中の処理が実行される.

-- Q4
-- PDOクラスをインスタンス化する際にtry catchが必要な理由を説明してください。
-- -- 例外処理が発生した場合に、メッセージを受け取るなどの処理を行いたいため


-------------------------------------------------------
-- 復習問題 App1 データ登録 -------------------------------------------------------
-------------------------------------------------------

-- Q1
-- データの受け取り・受け渡しの処理を記述するのはどのファイルでしたか？
-- ① functions.php     ② connection.php     ③ config.php     ④ ⭐️store.php

-- Q2
-- DB操作処理を記述するのはどのファイルでしたか？
-- ① functions.php     ② ⭐️connection.php     ③ config.php     ④ store.php

-- Q3
-- アプリケーションの設定を記述するのはどのファイルでしたか？
-- ① functions.php     ② connection.php     ③ ⭐️config.php     ④ store.php

-- Q4
-- 以下のフォームの送信ボタンを押下した際にstore.phpの$_POSTにどんな値が格納されますか？
-- <form action="store.php" method="post">
--   <input type="text" name="id" value="123">
--   <textarea　name="content">焼肉</textarea>
--   <button type="submit">送信</button>
-- </form>
-- -- 

-- -- formに入力された内容が格納された連想配列。
-- -- キーにはname属性の値が入り、バリューにはinputタグのvalue値、テキストボックスのタグ内の内容が格納される。
-- -- 例）
-- -- [
-- --   'id' => 123,
-- --   'content' => '焼肉'
-- -- ]

-- Q5
-- header('location: ./index.html')は何をしているか説明してください。
-- -- PHPの header関数でリダイレクト先を指定している。


-------------------------------------------------------
-- 復習問題 App1 データ取得 -------------------------------------------------------
-------------------------------------------------------
-- Q1
-- connection.phpで定義した変数$dbhの中には何を格納したでしょうか？
-- ① PDO文字列     ② PDOクラス     ③ PDO配列     ④ ⭐️PDOインスタンス

-- Q2
-- <?= $var; ?>は以下の選択肢のうち、どの処理の省略形ですか？
-- ① <php>$var</php>     ② ⭐️<?php echo $var; ?>     ③ <?php var_dump($var) ?>     ④ <?php $var; ?>

-- Q3
-- 一覧ページにTODOを表示するために今回行ったこととして間違っている選択肢はどれですか？
-- ① 一覧取得の関数が使えるように、index.phpでrequire_onceを使ってfunctions.phpを読み込んだ。⭕️
-- ② indexページでPHPが使えるようにファイルの拡張子を変更した。⭕️
-- ③ SELECT文でDBからデータを取得した。⭕️
-- ④ echoはPHPとHTMLが混在しているときは使えないので短縮表現を使った。❌使えない訳ではない。見やすいから使った。

-- Q4
-- queryメソッドの返り値のデータ型は以下の選択肢のうちどれでしょうか？
-- ① PDOインスタンス     ② 連想配列     ③ ⭐️PDOStatementインスタンス     ④ 文字列

-- Q5
-- getTodoList()の返り値について説明してください。
-- -- 削除日に値が入っていないレコードを、配列の形で返している。
-- -- getTodoList()の返り値として指定されているgetAllRecords()は、connection.phpに定義されている。
-- -- getAllRecords()の内容を確認すると、DBと接続して、deleted_atカラムに値が入っていないレコードを取得するSQLの実行結果を返している。


-------------------------------------------------------
-- 復習問題 App2 データ更新 -------------------------------------------------------
-------------------------------------------------------

-- Q1
-- parse_url関数の返り値のデータ型は以下の選択肢のうちどれでしょうか？
-- ① 連想配列     ② ⭐️文字列     ③ Urlオブジェクト     ④ PDOインスタンス

-- Q2
-- 遷移先にGETでデータを送るときにURLに付与する?以下をなんと言いますか？
-- ① クエリビルダ     ② ⭐️クエリパラメータ     ③ クエリアンカー     ④ クエリゲット

-- Q3
-- $_GETや$_SERVERのように、$_で始まる特殊な変数のことをなんと呼びますか？
-- ① インスタンス変数     ② ハイパーテキスト変数     ③ ⭐️スーパーグローバル変数     ④ スタンダードPHP変数

-- Q4
-- 以下のaタグのリンクを押下した際にedit.phpの$_GETにどんな値が格納されるか説明してください。
-- <a href="edit.php?todo_id=123&todo_content=焼肉">更新</a>
-- -- 

-- Q5
-- savePostedData($post)は何をしているか説明してください。

-- Q6
-- getRefererPath()は何をしているか説明してください。




-- ーーーーーXSS　クロスサイトスクリプティング

-- Q1
-- XSSとはどんな攻撃か、また攻撃者にどんなメリットがあるか説明してください。

-- Q2
-- htmlspecialchars()をe()として定義しなおすメリットを説明してください。

-- Q3
-- htmlspecialchars()を使うことでなぜXSSが防げるのか説明してください。

-- ーーーーーCSRF

-- Q1
-- CSRFとはどんな攻撃か、また攻撃者にどんなメリットがあるか説明してください。

-- Q2
-- SessionとCookieの違いを説明してください。

-- Q3
-- setToken()は何をしているか説明してください。

-- Q4
-- checkToken()は何をしているか説明してください。

-- Q5
-- トークンを使うことでなぜCSRFが防げるのか説明してください。

-- ーーーーーSQLインジェクション

-- Q1
-- SQLインジェクションとはどんな攻撃か、また攻撃者にどんなメリットがあるか説明してください。

-- Q2
-- ->prepare()の返り値と、またこのメソッドが何をしているか説明してください。

-- Q3
-- ->bindValue()が何をしているか説明してください。

-- Q4
-- 今回の対策でなぜSQLインジェクションが防げるのか説明してください。

-- ーーーーーーバリデーション

-- Q1
-- バリデーションの目的について説明してください。

-- Q2
-- validate()が何をしているか説明してください。

-- Q3
-- isset($post['content'])はなぜ必要か、無い場合どうなるか説明してください。

-- Q4
-- unsetError()を実行しない場合どうなるか説明してください。