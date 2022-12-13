<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WORK07</title>
</head>
<body>
  
    <?php $random01 = rand(1,10); ?>
    <?php $random02 = rand(1,10); ?>
    <?php $msg1 = "random01の方が大きいです。"; ?>
    <?php $msg2 = "random02の方が大きいです。"; ?>
    <?php $msg3 = "2つは同じ数です。"; ?>
    <?php $ans = ""; ?>
    <?php $count = 0; ?>
    <?php $ans = $ans . "random01=" . $random01 . "random02=" . $random02 . "です。"; ?> 
    <?php if ($random01 > $random02): ?>
      <?php $ans = $ans . $msg1; ?> 
    <?php elseif ($random01 == $random02): ?>
      <?php $ans = $ans . $msg3; ?>
    <?php elseif ($random01 < $random02): ?>
      <?php $ans = $ans . $msg2; ?>
    <?php endif; ?>
    <?php if ($random01 % 3 == 0): ?>
      <?php $count += 1; ?>
    <?php endif; ?>
    <?php if ($random02 % 3 == 0): ?>
      <?php $count += 1; ?>
    <?php endif; ?>  
    <?php if ($count == 2): ?>
      <?php $ans = $ans . "2つの数字の中には3の倍数が2つ含まれています。"; ?>
    <?php elseif ($count == 1): ?>
      <?php $ans = $ans . "2つの数字の中には3の倍数が1つ含まれています。"; ?>
    <?php else: ?>
      <?php $ans = $ans . "2つの数字の中に3の倍数が含まれていません"; ?>
    <?php endif; ?>

    <?php echo $ans ?>;



  
</body>
</html>