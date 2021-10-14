<!--  monitor.php -->
<!--  ボディー部分のプログラム -->
<!--  メンタル疾患、服薬管理システム -->
<!--  新規作成 2021/6/18 -->
<!--  作成者:Takao Hattori -->



<?php
    $message = 'メンタルセルフモニタリングシステム';

    $lines = file(__DIR__ . '/monitor.txt', FILE_IGNORE_NEW_LINES);

    require_once 'views/monitor_tpl.php';