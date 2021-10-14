<!--  result.php -->
<!--  セルフメンタルモニタリングWebシステムファイル書き込みプログラム -->
<!--  セルフメンタルモニタリングWebシステム-->
<!--  新規作成 2021/6/24 -->
<!--  作成者:乃木坂好きのITエンジニア -->


<?php
    $message = 'OK';

    $year = htmlspecialchars($_REQUEST['year']);
    $month = htmlspecialchars($_REQUEST['month']);
    $day = htmlspecialchars($_REQUEST['day']);
    $tired = htmlspecialchars($_REQUEST['tired']);
    $sleep_times = htmlspecialchars($_REQUEST['sleep_times']);
    
    
    try{
        $line = $year .  $month . $day. "\n". "疲労度チェック:" .  $tired . "\n" . "睡眠時間:" . $sleep_times . "\n" ;
        file_put_contents(__DIR__ . '/monitor.txt', $line, FILE_APPEND | LOCK_EX);
        } catch (Exception $e){
            echo "例外処理が発生しました";
            echo $e->getMessage();
        }
        
    

    require_once 'views/result.tpl.php';