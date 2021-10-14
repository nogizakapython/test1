<!--  mental.php -->
<!--  ボディー部分のプログラム -->
<!--  メンタル疾患、服薬管理システム -->
<!--  新規作成 2021/5/12 -->
<!--  作成者:Takao Hattori -->



<?php
    $message = 'メンタル疾患、投薬管理システム';

    $lines = file(__DIR__ . '/articles.txt', FILE_IGNORE_NEW_LINES);

    require_once 'views/mental.tpl.php';