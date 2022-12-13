<?php
  $check1 = '';
  $check2 = '';
  $check3 = '';
  $check = [];
  if (isset($_POST['check1'])) {
      array_push($check,htmlspecialchars($_POST['check1'], ENT_QUOTES, 'UTF-8'));
  }
  if (isset($_POST['check2'])) {
      array_push($check,htmlspecialchars($_POST['check2'], ENT_QUOTES, 'UTF-8'));
  }
  if (isset($_POST['check3'])) {
    array_push($check,htmlspecialchars($_POST['check3'], ENT_QUOTES, 'UTF-8'));
  }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WORK17</title>
</head>
<body>
  <form method="post">
    <input type="text" name="text">
    <input type="checkbox" name="check1" value="選択肢01" <? if($check1 === '選択肢01') {echo 'checked';} ?>>選択肢01
    <input type="checkbox" name="check2" value="選択肢02" <? if($check2 === '選択肢02') {echo 'checked';} ?>>選択肢02
    <input type="checkbox" name="check3" value="選択肢03" <? if($check3 === '選択肢03') {echo 'checked';} ?>>選択肢03
    <input type="submit" name="送信">
  </form>
  <?php if($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <div>選択肢は「<?php foreach($check as $line) { 
                                        echo $line . " ";
        } ?>」です。</div>
    <?php endif; ?>  
</body>
</html>