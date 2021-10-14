<!--  mental_tpl.php -->
<!--  ボディー部分のテンプレートプログラム -->
<!--  メンタルチェックシステム -->
<!--  新規作成 2021/5/12 -->
<!--  修正 2021/6/14　「状態が良い」を追加 -->
<!--  作成者:Takao Hattori -->



<!DOCTYPE html>
<html lang='ja'>
    <?php include('header.inc.php'); ?>
    <script type="text/javascript"> 
    <!-- 

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

    // -->
    
    </script>
    <body>

        <h1>メンタル疾患、投薬管理</h1>
        <p class="header"><?= $message ?></p>

        <form action='result.php' method='post' onSubmit="return check()">
        <dl>    
            <label for='year'>年</label>
            <select name="year">
                    <option value="2021年">2021年</option>
                    <option value="2022年">2022年</option>
                    <option value="2023年">2023年</option>
                    <option value="2024年">2024年</option>
                    <option value="2025年">2025年</option>
            </select>
            <p></p>
            <label for='month'>月</label>
            <select name="month">
                    <option value="1月">1月</option>
                    <option value="2月">2月</option>
                    <option value="3月">3月</option>
                    <option value="4月">4月</option>
                    <option value="5月">5月</option>
                    <option value="6月">6月</option>
                    <option value="7月">7月</option>
                    <option value="8月">8月</option>
                    <option value="9月">9月</option>
                    <option value="10月">10月</option>
                    <option value="11月">11月</option>
                    <option value="12月">12月</option>
            </select>
            <p></p>
            <label for='day'>日</label>
            <select name="day">
                    <option value="1日">1日</option>
                    <option value="2日">2日</option>
                    <option value="3日">3日</option>
                    <option value="4日">4日</option>
                    <option value="5日">5日</option>
                    <option value="6日">6日</option>
                    <option value="7日">7日</option>
                    <option value="8日">8日</option>
                    <option value="9日">9日</option>
                    <option value="10日">10日</option>
                    <option value="11日">11日</option>
                    <option value="12日">12日</option>
                    <option value="13日">13日</option>
                    <option value="14日">14日</option>
                    <option value="15日">15日</option>
                    <option value="16日">16日</option>
                    <option value="17日">17日</option>
                    <option value="18日">18日</option>
                    <option value="19日">19日</option>
                    <option value="20日">20日</option>
                    <option value="21日">21日</option>
                    <option value="22日">22日</option>
                    <option value="23日">23日</option>
                    <option value="24日">24日</option>
                    <option value="25日">25日</option>
                    <option value="26日">26日</option>
                    <option value="27日">27日</option>
                    <option value="28日">28日</option>
                    <option value="29日">29日</option>
                    <option value="30日">30日</option>
                    <option value="31日">31日</option>
            </select> 
            <p></p>
            <dd>睡眠度を選んでください。
            <select name="sleep">
                <option value="よく眠れた">よく眠れた</option>
                <option value="眠れた">眠れた</option>
                <option value="普通">普通</option>
                <option value="あまり眠れなかった">あまり眠れなかった</option>
                <option value="全く眠れなかった">全く眠れなかった</option>
            </select></dd>
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
                <input type="checkbox" name="OD" id="OD" value="大量に薬を飲みたい">OD
                <input type="checkbox" name="nothing" id="nothing" value="何もする気がない">何もする気がない
                <input type="checkbox" name="panik" id="panic"  value="パニック状態">パニック状態
                <input type="checkbox" name="kanashibari" id="kanashibari" value="金縛りにあった">金縛りにあった
                <input type="checkbox" name="good" id="kanashibari" value="いい状態">いい状態
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

        <h2>投稿一覧</h2>

        <?php foreach ($lines as $line) { ?>
            <p><?= $line ?></p>
        <?php } ?>

        <?php include('footer.inc.php'); ?>
        <br>
        <a href="../index.html"　id="menu">メニュー画面に戻る</a>
    

