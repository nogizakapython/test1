<!--  mental_tpl.php -->
<!--  ボディー部分のテンプレートプログラム -->
<!--  メンタルチェックシステム -->
<!--  新規作成 2021/5/12 -->
<!--  修正 2021/6/14　「状態が良い」を追加 -->
<!--  修正 2021/12/26　日付をカレンダーオブジェクトに変更。服薬の「昼食後」を追加 -->
<!--  修正 2022/8/4　就寝時間、起床時間を追加 -->
<!--  修正 2022/12/14　起床時間、就寝時間の順番変更 -->
<!--  修正 2023/2/6 項目整理、DB接続 -->
<!--  作成者:乃木坂好きのITエンジニア -->



<!DOCTYPE html>
<html lang='ja'>
    <meta charset='utf8'>
    <?php include('header.inc.php'); ?>
    <script type="text/javascript">


        function check(){
            //変数の定義
            const content = document.getElementById('content');
            const submit = document.getElementById('submit');

            if(content.value.replace(/\s+/, '').length === 0 ){
                window.alert('詳細が入力されていません。');
                return false;
            } else {
                if(window.confirm('送信してよろしいですか？')){ // 確認ダイアログを表示
                    return true;
                }  else{ // 「キャンセル」時の処理
                    window.alert('キャンセルされました'); // 警告ダイアログを表示
		           return false; // 送信を中止
                }
            }
        }



    </script>
    <body>

        <h1>メンタル疾患、投薬管理</h1>
        <p class="header"><?= $message ?></p>

        <form action='result.php' method='post' onSubmit="return check()">
        <dl>
            <label for='year'>年</label>
            <input type="date" name="hiduke"></div>
            <p></p>
            <dd>睡眠度を選んでください。
            <dt>
                <select name="sleep">
                <option value="よく眠れた">よく眠れた</option>
                <option value="眠れた">眠れた</option>
                <option value="普通">普通</option>
                <option value="あまり眠れなかった">あまり眠れなかった</option>
                <option value="全く眠れなかった">全く眠れなかった</option>
                </select>
            </dt>
            <dd>起床時間を選択してください
                <dt>
                    <input type="time" name="gtime" id="gtime">
                </dt>
            </dd>
            <dd>就寝時間を選択してください
                <dt>
                    <input type="time" name="dtime" id="dtime">
                </dt>
            </dd>
            <p></p>
            <dd>気分の落ち込み度
            <select name="mental">
                <option value="大きい"> 大きい
                <option value="やや大きい"> やや大きい
                <option value="普通"> 普通
                <option value="やや小さい"> やや小さい
                <option value="小さい"> 小さい
            </select>
            </dd>
            <p></p>
            <dd>服薬管理
                <input type="checkbox" name="morning" id="morning" value="朝食後">朝食後
                <input type="checkbox" name="afternoon" id="afternoon" value="昼食後">昼食後
                <input type="checkbox" name="evening" id="evening" value="夕食後">夕方後
                <input type="checkbox" name="night" id="night" value="寝る前">寝る前
            </dd>
            <p></p>
            <dd>あてはまる主な症状をチェックしてください
            <br>
                <input type="checkbox" name="iraira" id ="iraira" value="イライラしている">イライラしている
                <input type="checkbox" name="head_pain" id="head_pain" value="頭痛がする">頭痛がする
                <input type="checkbox" name="offence" id="offence" value="攻撃的">攻撃的
                <input type="checkbox" name="die" id="die" value="自殺願望">自殺願望
                <input type="checkbox" name="OE" id="OE" value="大量に薬を飲みたい">過食
                <input type="checkbox" name="nothing" id="nothing" value="何もする気がない">何もする気がない
                <input type="checkbox" name="panik" id="panic"  value="パニック状態">パニック状態
                <input type="checkbox" name="kanashibari" id="kanashibari" value="金縛りにあった">金縛りにあった
                <input type="checkbox" name="good" id="good" value="いい状態">いい状態
            <br>

        </dd>
        <p></p>
        <dd>今日の様子を詳しく書いてください</dd>
            <dd><textarea name="content" id="content" rows="5" cols="100" ></textarea></dd>
        <p></p>
    </dl>
        <input type="submit" value="button" id="submit" onMouseOver="changeColor()" onMouseOut="revertColor()">
    <script>
        function changeColor(){
            document.getElementById('submit').style.backgroundColor = 'yellow';
        }

        function revertColor(){
            document.getElementById('submit').style.backgroundColor = null;
        }
    </script>

        <h2>症状一覧</h2>

        <?php foreach ($lines as $line) { ?>
            <p><?= $line ?></p>
        <?php } ?>

        <?php include('footer.inc.php'); ?>
        <br>
        <a href="../index.html" id="menu">メニュー画面に戻る</a>


