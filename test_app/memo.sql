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
mysql -uroot
-- -------------------------------------------------------




-- 復習問題 -------------------------------------------------------
-- Q1
-- require_once()は何のために記述しているか説明してください。
-- ファイルの読み込みのために記述している。
-- 引数にファイル名を記載することで、そのファイルに記載している変数や関数を呼び出すことができる。

-- Q2
-- connectPdo() の返り値は何か、またこの記述は何をするための記述か説明してください。
-- PDOクラスから作られたインスタンス（オブジェクト）。
-- 指定のデータベースに接続を試み、成功時はオブジェクトを返し、失敗時は例外メッセージを受け取るための記述。
-- PDOクラス： PHP とデータベースサーバーの間の接続を行える機能を備えたクラス。

-- Q3
-- try catchとは何か説明してください。
-- 通信処理などを行う際に使用する構文。
-- tryの中には、〜

-- Q4
-- PDOクラスをインスタンス化する際にtry catchが必要な理由を説明してください。
-- 例外処理が発生した場合に、メッセージを受け取るなどの処理を行いたいため



-- 復習問題 -------------------------------------------------------
-- Q1
-- データの受け取り・受け渡しの処理を記述するのはどのファイルでしたか？
-- ① functions.php     ② connection.php     ③ config.php     ④ store.php

-- Q2
-- DB操作処理を記述するのはどのファイルでしたか？
-- ① functions.php     ② ⭐️connection.php     ③ config.php     ④ store.php

-- Q3
-- アプリケーションの設定を記述するのはどのファイルでしたか？
-- ① functions.php     ② connection.php     ③ config.php     ④ store.php

-- Q4
-- 以下のフォームの送信ボタンを押下した際にstore.phpの$_POSTにどんな値が格納されますか？

-- <form action="store.php" method="post">
--   <input type="text" name="id" value="123">
--   <textarea　name="content">焼肉</textarea>
--   <button type="submit">送信</button>
-- </form>

-- Q5
-- header('location: ./index.html')は何をしているか説明してください。