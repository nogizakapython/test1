<!--  result.tpl.php -->
<!--  結果表示ののテンプレートプログラム -->
<!--  メンタル疾患、服薬管理システム -->
<!--  新規作成 2021/5/12 -->
<!--  修正 2021/6/14 「状態が良い」を追加 -->
<!--  作成者:Takao Hattori -->


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
            
                if(isset($sleep)) {
                    echo $sleep . ', ';
                }
            
                if(isset($mental)) {
                    echo $mental;
                }
                
                if(isset($morning)) {
                    echo $morning;
                }
            
                if(isset($evening)) {
                    echo $evening;
                }
            
                if(isset($night)) {
                    echo $night;
                }
            
                if(isset($iraira)) {
                    echo $iraira;
                }
            
                if(isset($head_pain)) {
                    echo $head_pain;
                }
            
                if(isset($offence)) {
                    echo $head_pain;
                }
            
                if(isset($die)) {
                    echo $die;
                }
                
                if(isset($OD)) {
                    echo $die;
                }
            
                if(isset($nothing)) {
                    echo $nothing;
                }
            
                if(isset($panic)) {
                    echo $nothing;
                }
            
                if(isset($kanashibari)) {
                    echo $kanashibari;
                }
            
                if(isset($good)) {
                    echo $good;
                }
            
                if(isset($content)) {
                    echo $content;
                }
            
            ?>
        </p>

        <form action='mental.php' method='get'>
            <button type='submit' id="submit">戻る</button>
        </form>

        <?php include('footer.inc.php'); ?>
    </body>
</html>
