<!--  monitor_tpl.php -->
<!--  ボディー部分のテンプレートプログラム -->
<!--  メンタルチェックシステム -->
<!--  新規作成 2021/6/18 -->
<!--  作成者:Takao Hattori -->



<!DOCTYPE html>
<html lang='ja'>
    <?php include('header.inc.php'); ?>
    <script type="text/javascript"> 
    <!-- 
        function check(){
            if(window.confirm('送信してよろしいですか？')){ // 確認ダイアログを表示
                return true;
            }  else{ // 「キャンセル」時の処理
                window.alert('キャンセルされました'); // 警告ダイアログを表示
		      return false; // 送信を中止
            }
        }
        

    // -->
    
    </script>
    <body>

        <h1>セルフメンタルモニタリングシステム</h1>
        <p class="header"><?= $message ?></p>

        <form action='result.php' method='post' onSubmit="return check()">
        <dl>    
            <label for='year'>年</label>
            <select name="year">
            <?php
            $year = array (
                    "2021年",
                    "2022年",
                    "2023年",
                    "2024年",
                    "2025年",
                    "2026年",
                    "2027年",
                    "2028年",
                    "2029年",
                    "2030年"
            );
            foreach ( $year as $val ){
                echo '<option value="',$val,'">',$val,'</option>';
            }
            ?>
            </select>
            <p></p>
            <label for='month'>月</label>
            <select name="month">
            <?php    
            $month = array (
                    "1月",
                    "2月",
                    "3月",
                    "4月",
                    "5月",
                    "6月",
                    "7月",
                    "8月",
                    "9月",
                    "10月",
                    "11月",
                    "12月"
            );
            foreach ( $month as $value ){
                echo '<option value="',$value,'">',$value,'</option>';
            }
            ?>
            </select>
            <p></p>
            <label for='day'>日</label>
            <select name="day">
            <?php
            $day = array (
                    "1日",
                    "2日",
                    "3日",
                    "4日",
                    "5日",
                    "6日",
                    "7日",
                    "8日",
                    "9日",
                    "10日",
                    "11日",
                    "12日",
                    "13日",
                    "14日",
                    "15日",
                    "16日",
                    "17日",
                    "18日",
                    "19日",
                    "20日",
                    "21日",
                    "22日",
                    "23日",
                    "24日",
                    "25日",
                    "26日",
                    "27日",
                    "28日",
                    "29日",
                    "30日",
                    "31日"
            );
            foreach ( $day as $dt ){
                echo '<option value="',$dt,'">',$dt,'</option>';
            }
            ?>
            </select> 
            <p></p>
            <dd>疲労度チェック(10段階)
            <select name="tired">
            <?php
            $tire = array (
                    "1(疲れていない)",
                    "2",
                    "3",
                    "4",
                    "5(普通)",
                    "6",
                    "7",
                    "8",
                    "9",
                    "10(疲れた状態)",
            );
            foreach ( $tire as $val ){
                echo '<option value="',$val,'">',$val,'</option>';
            }
            ?>
            </select>    
            <p></p>
            <dd>睡眠時間チェック
            <select name="sleep_times">
            <?php
            $sleep_times = array (
                    "3時間未満",
                    "3時間",
                    "3時間半",
                    "4時間",
                    "4時間半",
                    "5時間",
                    "5時間半",
                    "6時間(標準)",
                    "6時間半",
                    "7時間",
                    "7時間半",
                    "8時間",
                    "8時間半",
                    "9時間",
                    "9時間半",
                    "10時間以上"
            );
            foreach ( $sleep_times as $time ){
                echo '<option value="',$time,'">',$time,'</option>';
            }
            ?>
            </select>
            
    </dl>    
    <input type="submit" value="button" id="submit" onMouseOver="changeColor()" onMouseOut="revertColor()">
    <script>
        function changeColor(){
            document.getElementById('submit').style.backgroundColor = 'blue';
        }

        function revertColor(){
            document.getElementById('submit').style.backgroundColor = null;
        }
    </script>

    <h2>投稿一覧</h2>

    <?php foreach ($lines as $line) { ?>
        <p><?= $line ?></p>
    <?php } ?>

    <?php include('footer.inc.php'); ?>
    <br>
    <a href="../index.html"　id="menu">メニュー画面に戻る</a>
    

