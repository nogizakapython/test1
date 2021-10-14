<!--  result.tpl.php -->
<!--  結果表示ののテンプレートプログラム -->
<!--  セルフメンタルモニタリングWebシステム -->
<!--  新規作成 2021/6/24 -->
<!--  作成者:乃木坂好きのITエンジニア -->


<!DOCTYPE html>
<html lang='ja'>
    <?php include('header.inc.php'); ?>
    <body>

        <h1>書き込みました</h1>
        <p><?= $message ?></p>

        <p>
            <?php
                if(isset($year)) {
                    echo $year . ', ';
                }

                if(isset($month)) {
                    echo $month . ', ';
                }
            
                if(isset($day)) {
                    echo $day . ', ';
                }
            
                if(isset($tired)) {
                    echo $tired . ', ';
                }
            
                if(isset($sleep_times)) {
                    echo $sleep_times;
                }
            ?>
        </p>

        <form action='monitor.php' method='get'>
            <button type='submit' id="submit">戻る</button>
        </form>

        <?php include('footer.inc.php'); ?>
    </body>
</html>
