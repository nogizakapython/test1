<?php
    $file_name = "msg.txt";
    if(!file_exists($file)) {
        touch($file_name);
    }   
    $fp = fopen($file_name,'r');
    while (($content = fgets($fp)) !== false){
        $out = trim($content); 
    }
    fclose($fp);

    $date = date("Y-m-d");
    $fp = fopen($file_name,"w");
    if($_POST['submit']){
        if(isset($_POST['test1'] ) && $_POST['test1'] != ""){
            $out = '日付: ' . $date . ' 入力した内容: ' . htmlspecialchars($_POST['test1'],ENT_QUOTES,'UTF-8');
        } else {
            $out = "入力されていません";
        }
        fputs($fp,$out);
        fclose($fp);
    }
    
?>    
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>現在日付取得テスト</title>
</head>
<body>
    <div id="out" name="out"><?php echo $out ?></div>
    <form method="post" action="hiduketest3.php">
        <input type="text" name="test1">
        <input type="submit" name="submit" value="送信">
    </form>
     
</body>
</html>