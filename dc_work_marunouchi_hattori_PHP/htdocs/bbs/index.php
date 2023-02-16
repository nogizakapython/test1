<!-- 掲示板プログラム -->
<!-- 新規作成 2022/2/15 -->
<!-- 掲示板書き込みフォームと投稿一覧 -->

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

</body>
    <form method="post" action="entry.php">
        <label>タイトル</label>
        <br>
        <input type="text" name="title" >
        <br>
        <label>書き込み内容</label>
        <br>
        <textarea id="sum" name="sum" rows="3" cols="35">
        </textarea>
        <br>
        <input type="submit" value="送信">
        <br>
    </form>

    <p class="ichiran"> 投稿一覧 </p>
    <?php
        $fp = file_get_contents("bbs.txt");
        echo $fp;
    ?>
</html>
