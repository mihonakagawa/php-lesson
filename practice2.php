<!-- 最初の5秒で説明する -->
<!-- 最初になんの説明をするかを説明する -->
<!-- 自信あるように見せる -->

<?php
// Q1 tic-tac問題 ----------------------------------------
  // 1から100までの数字について以下の条件に沿って表示してください。
    // 1から100までの数字について処理を実行する。
    // 4の倍数のときは tic を出力。
    // 5の倍数のときは tac を出力。
    // 4の倍数かつ5の倍数のときは tic-tac を出力。
    // 上記以外の数のときはそのままその数字を出力する。
    // 出力結果が以下の通り縦に並ぶようにしてください。

// なんの説明をこれから説明するか？／問題文の説明
// 条件はいくつ？
// どんな条件？


for ($i = 1; $i <= 100; $i++) {
    if ($i % 4 === 0 && $i % 5 === 0) {
        echo 'tic-tac' . "\n";
    } else if ($i % 4 === 0) {
        echo 'tic' . "\n";
    } else if ($i % 5 === 0) {
        echo 'tac' . "\n";
    } else {
        echo $i . "\n";
    }
}

// PHP_EOLでも可
// $i <= 100;にvar_dumpはだめなのなぜ


// tic-tacになる条件から書くのはなぜ？
// $i = 1;を'test'にしたら？
// →$i <= 100 の条件式に当てはまらないので、何も出力されない

// - for文を用いて処理を記述できていること
// - for文の説明が適切であること※for文で定義した変数をインクリメントしている箇所の説明が甘い人がいる
// - tic-tacを出力する際の処理はif文をネストしていないこと
// - 条件分岐の順番について根拠を説明できていること
// 「かつ」
// どのように違ってた？
// 解説一回するので、次の説明で1から自分で説明できるようにしよう
// 何が起こるかを実行させる
// 例えば、4の倍数のみの場合を1番目に書くと、tic-tacが出力されない
// ヒント：PHPは上から認識される

// - 改行して出力されていること

// range()


// for(カウンタの初期値; ループ処理の条件式; 増減式){
//     実行する処理
// }

// for文の処理の順番
// ループの条件式の意味：iが100より小さいか否かを判断している。「ループ回数」ではない。


// switch文で条件分岐できるが、もし使っていてもやってる処理結果があってればOK？


// Q2 多次元配列 ----------------------------------------
  // まずは下記記述をエディタにコピー&ペーストしてください。
  // それができたら、var_dump を使用して配列の中身を確認してみましょう。この問題では多次元配列の値の扱いについて練習します。
$personalInfos = [
    [
        'name' => 'Aさん',
        'mail' => 'aaa@mail.com',
        'tel' => '09011112222'
    ],
    [
        'name' => 'Bさん',
        'mail' => 'bbb@mail.com',
        'tel' => '08033334444'
    ],
    [
        'name' => 'Cさん',
        'mail' => 'ccc@mail.com',
        'tel' => '09055556666'
    ],
];
var_dump($personalInfos);

  // 問題1.上記の配列を用いて下記のように表示してください。
  // Bさんの電話番号は08033334444です。
  echo $personalInfos[1]['name'] . 'の電話番号は' . $personalInfos[1]['tel'] . 'です。';
  
  // なぜ$personalInfos[1]と書いたか？Aさんを取得したいときはなんてかく？
  // ・$personalInfos[1]にはどのようなデータが入っているか？ -> インデックス1番目の連想配列
  // プロパティではなく、要素(elements)



  // 問題2
  // foreachを用いて下記のように表示してください。(数字が1から始まっていることに注意しましょう)
  // 1番目のAさんのメールアドレスはaaa@mail.comで、電話番号は09011112222です。
  // 2番目のBさんのメールアドレスはbbb@mail.comで、電話番号は08033334444です。
  // 3番目のCさんのメールアドレスはccc@mail.comで、電話番号は09055556666です。
  foreach ($personalInfos as $index => $info) {
      // $index++; // 先に実行する
      echo $index + 1 . '番目の' . $info['name'] . 'のメールアドレスは' . $info['mail'] . 'で、電話番号は' . $info['tel'] . 'です。' . "\n";
  }

  // 3回ループしたら$indexには何が入っている？
  // なんで？
  // $infoデータ型は？→ Array！！！
  // 覚える・定義を見にいくのではなく、呼び出しているところからデータ型を推測する
  // ＄infoに入っているものは？→ 連想配列

  // 問題3
  $ageList = [25, 30, 18];
  // 上記の$ageListを使用して、$personalinfosに age というKeyに対して$ageListのそれぞれの年齢をValueとして追加してください。その際は、foreachを使用してください。
  // 追加ができたらvar_dumpを使用して配列の中身を確認してください。下記のようになっていたらOKです。
  // array(3) {
  //   [0]=> array(4) {
  //     ["name"] => string(7) "Aさん"
  //     ["mail"] => string(13) "aaa@mail.com"
  //     ["tel"]  => string(11) "09011112222"
  //     ["age"]  => int(25)
  //   }
  //   [1]=> array(4) {
  //     ["name"] => string(7) "Bさん"
  //     ["mail"] => string(13) "bbb@mail.com"
  //     ["tel"]  => string(11) "08033334444"
  //     ["age"]  => int(30)
  //   }
  //   [2]=> array(4) {
  //     ["name"] => string(7) "Cさん"
  //     ["mail"] => string(13) "ccc@mail.com"
  //     ["tel"]  => string(11) "09055556666"
  //     ["age"]  => int(18)
  //   }
  // }

foreach ($ageList as $index => $age) {
  $personalInfos[$index]['age'] = $age;
  // $index++; /* 不要 */
}
var_dump($personalInfos);
// $personalInfos[$index]でどんなデータが取れているか　→　インデックス番号の連想配列



// 「$personalInfosを回していても書き換えられるか？」→どっちでもできる
foreach ($personalInfos as $index => $info) {
  $personalInfos[$index]['age'] = $ageList[$index];
}


// 参照渡し
foreach ($ageList as $index => &$age) {
  $info['age'] = 20; // 通常は追加されないが、＆を使うと参照先を渡しているので無理やり変えられる
  // unsetを使えばOKということにはなっている
}








class Person
{
    // プロパティ。設計図なので初期値いらない
    public $person_name;
    public $favorite_food;
    
    // メソッド。引数ある場合は外から渡せる
    public function setProp($name, $food)
    {
        $this->person_name = $name;
        $this->favorite_food = $food;
        return this;
    }

    public function showInfo()
    {
        echo '私の名前は、' . $this->person_name . 'です。好きな食べ物は、' . $this->favorite_food . 'です。' . "\n";
    }
    
    public function changeFavFood($newVal)
    {
        $this->favorite_food = $newVal;
        echo '好きな食べ物を' . $this->favorite_food . 'に変更しました。'. "\n";
        // return
    }

    public function returnPersonObj() {
      return new Person();
    }
}

$nakagawa = new Person();
$nakagawa->setProp('ss', 'ssss');
echo '' . $nakagawa->returnPersonObj()->setProp('中川', 'トマト')->;

$yamada = new Person();
$nakagawa->setProp('ss', 'ssss');



$nakagawa->showInfo();
// $nakagawa->changeFavFood('りんご');
$nakagawa->showInfo();


// 私の名前は、中川です。好きな食べ物は、トマトです。
// 好きな食べ物をりんごに変更しました。
// 私の名前は、中川です。好きな食べ物は、りんごです。









// Q3 オブジェクト-1 ----------------------------------------
// 以下のクラスのプロパティを使って、条件に一致するような文章を表示してください。
class Student
{
    public $studentId;// 設計図なので初期値いらない
    public $name;
    
    public function __construct($studentId, $name)
    {
        $this->studentId = $studentId; /** この時の$thisはStudentオブジェクト（実体化してる） */
        $this->name = $name;
    }
    public function attend($subject)
    {
        // echo '授業に出席しました。';
        echo $this->name . 'は' . $subject . 'の授業に参加しました。学籍番号：' . $this->studentId;
        // ↑ インスタンス化した後に使える、という認識のため$thisはオブジェクトのこと
    }
}
コンストラクタの中で何をしている？


// ■ 条件
  // studentIdプロパティは正の整数を設定してください。
  // nameプロパティは任意の値を設定してください。
// ■ 出力例:"学籍番号120番の生徒は山田です。"

// $student = new Student; /* コンストラクタの引数がないため、エラーになる **/
// 0が最初だとダメ
// マジックメソッド
$student = new Student(120, '山田');
var_dump($student);

echo '学籍番号' . $student->studentId . '番の生徒は' . $student->name . 'です。';
/* 下記の書き方はエラーになる **/
// echo '学籍番号' . $studentId -> studentId . '番の生徒は' . $name -> name . 'です。';


// - construct内で何をしているか
// // コンストラクタで行っていること：渡された引数をプロパティに代入

// - コンストラクタ動くタイミング
// // インスタンス化と同時。

// - "$this"は何を指しているか？また、何が入っているか？
// // この時の$thisはStudentオブジェクト（実体化してる）

// - "$student"には何が入るか
// // Studentインスタンス（実体化したクラスのこと）※もしくはオブジェクト
// // ↑ インスタンスとオブジェクトの違い：ほぼ同義。実体化したそのもの。オブジェクトと呼ぶ＝実体化している

// - メソッドとプロパティの違い
//   // クラスの中で定義している変数：プロパティ
//   // クラス内で定義してる関数：メソッド
//   // public:アクセス修飾子（public, private, protected同じクラスおよび子クラスからアクセス可能）

// - なぜ実体化しないといけない？（いちいち実体化させるとどうなるか？）
// // → 型をある程度設定しておくことで、引数とかだけ変えて使いまわせるから。

// - インスタンス化した時の引数の行方
// // コンストラクタに渡され、プロパティに格納される

// - クラスとインスタンスの違いは？
// // クラスは「設計図」、インスタンスは「実体」

// - シングルアロー演算子は何しているか？
// // PHPのアロー演算子は、主にクラスから生成されたインスタンスで、プロパティやメソッドにアクセスする場合に用いられます。

// - ※ 対してダブルアロー演算子は、主に以下の2つの場面で用いられます。
// // ・連想配列を取り扱うとき
// // ・アロー関数を実装するとき

// - new演算子とは？
// // クラスを初期化する演算子




// Q4 オブジェクト-2 ----------------------------------------
// 引き続きQ4のクラスを使用します。
// attendメソッドの処理を書き換えて、条件に沿った内容を表示してください。

// $yamada = new Student(120, '山田');
// $yamada->attend('PHP');

// ■ 条件
  // attendメソッド以外は書き換えないでください。
// ■ 出力例:"山田はPHPの授業に参加しました。学籍番号：120"
// 1. attend
$student->attend('PHP');
// ->の両端はスペース開けない！（エラーは出ないけど）

// 引数の名前



// Q5 定義済みクラス ----------------------------------------
// 上記では自作のクラスを使用しましたが、関数と同様PHP側ですでに用意されているクラスがあります。
// 今回はDateTimeという定義済みのクラスを使用して、以下の問題通りの処理を書きましょう。
    // 問題1
    // 1ヶ月前の日付を表すDateTimeインスタンスを作成し、出力結果と同じフォーマットで出力しましょう。
    // 出力結果(2021年3月2日の場合)
    // 2021-02-02

    $lastMonth = new DateTime(); // DateTimeオブジェクトを作成
    echo $lastMonth->modify('-1 months')->format('Y-m-d') . "\n"; // フォーマットして出力






    // var_dump($lastMonth->modify('-1 months'));
    // var_dump($lastMonth->modify('-1 months')->format('y-m-d'));

    // - 定義済みクラスとは
    // // PHP側ですでに用意されているクラス
    // // マニュアルを見てほしい
    // - modifyの返り値の型は？
    // // → オブジェクト（Datetime）
    // - formatの返り値の型は？
    // // → string型

    // 日付を変化させるメソッド →
    // メソッドとか関数の説明の時は、

    // 問題2
    // 今日の日付と1992年4月25日との日付の差を計算して、総日数を出力しましょう。
    // 出力結果(2021年3月2日の場合)
    // あの日から10538日経過しました。
    $now = new DateTime();
    $prev = new DateTime('1992-4-25');
    $diff = $prev->diff($now);
    // var_dump($prev->diff($now));

    echo 'あの日から' . $diff->format('%a') . '日経過しました。';
    
    // $diff->format('%a')

    // - diffの返り値の型は？
    // // → オブジェクト（DateInterval）
    // - 問題2のformatは問題1のformatと同じメソッドか？ // 違う。
    // // ・問題2のformat： dateIntervalオブジェクトの中のformat()。指定したフォーマットで日時を返す。
    //     // public DateInterval::format(string $format): string
    // // ・問題1のformat： dateTimeオブジェクトの中のformat()。間隔をフォーマットする。
    //     // public DateTime::format(string $format): string

    // - "%a"とは何か？
    // // ％とは、formatメソッドの引数に渡す文字列の最初の記号。
    // // PHP公式によると、パーセント記号 (%) で始めなければならない、とある。
    // // aとは、DateTime::diff() の返り値のオブジェクトに使った場合は総日数、それ以外の場合は (unknown)

?>
