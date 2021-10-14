<!--  result.php -->
<!--  メンタル疾患、服薬管理の表示プログラム -->
<!--  メンタル疾患、服薬管理システム -->
<!--  新規作成 2021/5/12 -->
<!--  修正 2021/6/14 　何もない時は「状態がよい」を追加-->
<!--  作成者:乃木坂好きのITエンジニア -->


<?php
    $message = 'OK';

    $year = htmlspecialchars($_REQUEST['year']);
    $month = htmlspecialchars($_REQUEST['month']);
    $day = htmlspecialchars($_REQUEST['day']);
    $sleep = htmlspecialchars($_REQUEST['sleep']);
    $mental = htmlspecialchars($_REQUEST['mental']);
    $morning = htmlspecialchars($_REQUEST['morning']);
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
        $line = $year .  $month . $day. "\n". "睡眠度:" .  $sleep . "\n" . "気分の落ち込み度:" . $mental . "\n" . "投薬管理： " . $morning . " " . $evening. " " . $night ."\n" . "あてはまる主な症状: " .$iraira . " " . $head_pain . " ". $offence . " " .$die . " " . $OD . " " .$nothing . " " .$panik . " " .$kanashibari. " ".$good ."\n" . "症状の詳細:" . $content . "\n" . PHP_EOL;
        file_put_contents(__DIR__ . '/articles.txt', $line, FILE_APPEND | LOCK_EX);
        } catch (Exception $e){
            echo "例外処理が発生しました";
            echo $e->getMessage();
        }
        
    

    require_once 'views/result.tpl.php';