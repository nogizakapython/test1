<!--   DBからSELECTメニューのデータを選択できるようにする -->
<!--   新規作成  2021/08/08-->
<!--   作成者  乃木坂好きのITエンジニア-->
<!DOCTYPE html>
<html lang="ja">

<!--  ヘッダー部分-->    
<head>
    <meta charset="utf-8">
    <title>セレクトメニューテスト</title>

</head>
    
<!--  ボディー部分-->    
<body>
<?php
	// データベースに接続する
	$conn = mysql_connect("localhost", "root", "");
    //$conn -> set_charset('utf8');
    mysql_select_db("test1",$conn);
    mysql_query('SET NAMES utf8' , $conn);

    
	// print_r($_POST);
    
    echo "分類: <select name='data'>";
    $a = mysql_query("select id,jikan from jikan1" );
    while($b = mysql_fetch_array($a)){
        echo "<option value = '$b'>$b[id]:$b[jikan]</option>";
    }
    echo "</select>";
    echo "<br><br>";
    
?>    
    
 

</body>
<footer>
    <small> by 乃木坂好きのITエンジニア</small>
</footer>
</html>
