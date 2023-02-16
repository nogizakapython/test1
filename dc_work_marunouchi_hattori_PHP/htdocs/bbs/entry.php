<!-- 新規作成 2023/2/15 -->
<!-- 入力チェックを追加 2023/2/16 -->
<!-- BBS掲示板cgiプログラム -->
<!-- 書き込み処理 -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BBS掲示板</title>
    <link rel="stylesheet" href="common.css">
</head>
<body>
    <?php
        // メッセージ出力変数の定義
        $msg1 = "タイトルを入力してください";
        $msg2 = "内容を入力してください";
        // メッセージ出力配列の定義
        $msg_arr = [];

        // リンク先表示関数
        function out_url() {
            echo "<a href=index.php>掲示板へ</a>";
        }

        // 文字列の長さ取得関数
        function count_str($str){
            $str = str_replace(array(" ","　"),"",$str);
            return strlen($str);
        }

        // タイトルを取得する変数
        $title = $_POST["title"];
        #入力チェック関数
        $count1 = count_str($title);
        // 入力チェック確認
        if($count1 == 0){
            array_push($msg_arr,$msg1);
        }
        // 内容を取得する変数
        $sum = $_POST["sum"];
        // 入力チェック関数
        $count2 = count_str($sum);
        // 入力チェック確認
        if($count2 == 0){
            array_push($msg_arr,$msg2);
        }
        $num = count($msg_arr);
        #入力されていない項目があれば表示して処理を終了する
        if($num >= 1){
            foreach($msg_arr as $msg){
                echo "<p class='errmsg'>{$msg}</p>";
            }
            out_url();
            exit();
        }

        // 日付を取得
        $date1 = date("Y年m月d日 H時i分s秒");
        // ミリ秒を取得
        $w_time = microtime(true);
        $w_array = explode('.',$w_time);
        $mtime = $w_array[1];
        $microtime = intval($mtime / 100);

        // ファイルに書き込む内容を変数に代入する。
        $result = "<br>". "日付:" .$date1 . $microtime . "<br>" . "タイトル:" . $title . "<br>" . "内容:" . $sum;

        // 書き込みモードでファイルを開く
        $write1 = file_put_contents("bbs.txt", $result,FILE_APPEND);

        // ファイルの書き込みチェック処理
        if($write1){
            echo "<p class='fmsg'>ファイルの書き込みが成功しました。</p>";
        } else {
            echo "<p class='fmsg'>ファイルの書き込みに失敗しました。</p>";
        }

        out_url();

    ?>
</body>

</html>
