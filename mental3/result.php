<!--  result.php -->
<!--  メンタル疾患、服薬管理の表示プログラム -->
<!--  メンタル疾患、服薬管理システム -->
<!--  新規作成 2021/5/12 -->
<!--  修正 2021/6/14 何もない時は「状態がよい」を追加-->
<!--  修正 2021/12/26 服薬管理の「昼食後」を追加。日付をカレンダーオブジェクトで追加-->
<!--  修正 2022/8/4 就寝時間、起床時間を入力できるように追加-->
<!--  修正 2022/12/14 起床時間、就寝時間の出力位置を変更-->

<!--  作成者:乃木坂好きのITエンジニア -->


<?php
    $message = 'OK';

    $hiduke = htmlspecialchars($_REQUEST['hiduke']);
    $sleep = htmlspecialchars($_REQUEST['sleep']);
    $dtime  = htmlspecialchars($_REQUEST['dtime']);
    $gtime  = htmlspecialchars($_REQUEST['gtime']);
    $mental = htmlspecialchars($_REQUEST['mental']);
    $morning = htmlspecialchars($_REQUEST['morning']);
    $afternoon = htmlspecialchars($_REQUEST['afternoon']);
    $evening = htmlspecialchars($_REQUEST['evening']);
    $night = htmlspecialchars($_REQUEST['night']);
    $iraira = htmlspecialchars($_REQUEST['iraira']);
    $head_pain = htmlspecialchars($_REQUEST['head_pain']);
    $offence = htmlspecialchars($_REQUEST['offence']);
    $die = htmlspecialchars($_REQUEST['die']);
    $OD = htmlspecialchars($_REQUEST['OD']);
    $nothing = htmlspecialchars($_REQUEST['nothing']);
    $panik = htmlspecialchars($_REQUEST['panic']);
    $kanashibari = htmlspecialchars($_REQUEST['kanashibari']);
    $good = htmlspecialchars($_REQUEST['good']);
    $content = htmlspecialchars($_REQUEST['content']);

    try{
        $line = $hiduke. "\n". "睡眠度:" .  $sleep . "\n" .  "起床時間:" . $gtime . "\n" ."就寝時間:" . $dtime . "\n" . "気分の落ち込み度:" . $mental . "\n" . "投薬管理： " . $morning . " " . $afternoon . " " . $evening. " " . $night ."\n" . "あてはまる主な症状: " .$iraira . " " . $head_pain . " ". $offence . " " .$die . " " . $OD . " " .$nothing . " " .$panik . " " .$kanashibari. " ".$good ."\n" . "症状の詳細:" . $content . "\n" . PHP_EOL;
        file_put_contents(__DIR__ . '/articles.txt', $line, FILE_APPEND | LOCK_EX);
        } catch (Exception $e){
            echo "例外処理が発生しました";
            echo $e->getMessage();
        }



    require_once 'views/result.tpl.php';
