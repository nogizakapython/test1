<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WORK30</title>
</head>
<body>
<?php
    $host = 'mysql34.conoha.ne.jp';
    $login_user = 'bcdhm_nagoya_pf0005';
    $password = 'Mt3!+qa_';
    $database = 'bcdhm_nagoya_pf0005';
    $error_msg = [];
    $file_name = "testgazou.txt";
    $out = '';
    $flag = 0;
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
        $out = "";
        if(isset($_POST['picname'] ) && $_POST['picname'] != ""){
            $str = $_POST['picname'];
            if(preg_match("/^[a-zA-Z0-9-_.]+$/", $str)){
                $flag += 1;
            } else {
                $out =  $out . "半角英数字以外の文字が入力されています。";
            }    
        } else {
            $out = $out . "画像名が入力されていません";
        }
        if(isset($_FILES['upfile'])){
            $save = 'img/' . basename($_FILES['upfile']['name']);
            $check = basename($_FILES['upfile']['name']);
            echo $check;
            if(preg_match('/\.(jpe?g|png)\z/i', $check) == 1){
                if($str == $check){
                    $flag += 1;
                } else {
                    $out = $out . "ファイル名が一致していません";
                }    
            } else {
                $out = $out . "不正な拡張子です";
            }    
        } else {    
            $fp = fopen($file_name,"w");
            $out = $out . 'ファイルが選択されていません';
        }
    }
    if ($flag != 2){        
        fputs($fp,$out);
        fclose($fp);
    } else {
        //ファイルを保存先ディレクトリに移動させる
        if(move_uploaded_file($_FILES['upfile']['tmp_name'], $save)){
            echo 'アップロード成功しました。';
        }else{
            echo 'アップロード失敗しました。';
        }
        
        $db = new mysqli($host, $login_user, $password, $database);
        if ($db->connect_error){
            echo $db->connect_error;
            exit();
        } else {
            $db->set_charset("utf8");
        }
  
        if($_SERVER["REQUEST_METHOD"] == "POST") {
             if (isset($_POST['picname'])) {
                 $image_name = $_POST['picname'];
             }
             $public_flag = 1;
             $create_date = $date;
             $db->begin_transaction();	// トランザクション開始
  
             //INSERT文の実行
             $insert = "INSERT INTO pictable(image_name,public_flg,create_date,update_date) VALUE 
            ('{$image_name}',{$public_flag}, '{$create_date}','{$create_date}');";
            if($result = $db->query($insert)) {
                $row = $db->affected_rows;
            } else {
                $error_msg[] = 'INSERT実行エラー [実行SQL]' . $insert;
            }
            //$error_msg[] = '強制的にエラーメッセージを挿入';
            print_r($error_msg);
            //エラーメッセージ格納の有無によりトランザクションの成否を判定
            if (count($error_msg) == 0) {
                echo $row.'件追加しました。'; 
                $db->commit();	// 正常に終了したらコミット
            } else {
                echo '追加が失敗しました。'; 
                $db->rollback();	// エラーが起きたらロールバック
            }
        }    
    }
?>

<meta http-equiv="refresh" content="1;URL=https://portfolio.dc-itex.com/nagoya/0005/htdocs/work30.php">

</body>
</html>