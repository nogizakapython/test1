<!--  mental.php -->
<!--  ボディー部分のプログラム -->
<!--  メンタル疾患、服薬管理システム -->
<!--  新規作成 2021/5/12 -->
<!--  修正 2021/12/26  フロントエンド改修に伴う修正-->
<!--  作成者:乃木坂好きのITエンジニア -->



<?php
    $message = 'メンタル疾患、投薬管理システム';

    $lines = file(__DIR__ . '/articles.txt', FILE_IGNORE_NEW_LINES);

    require_once 'views/mental.tpl.php';