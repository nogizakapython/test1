<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>信号</title>
</head>
<body>
  <?php

  // $signal = 'red';
  $signal = 'red';

  switch ($signal) {
    case 'red':
      echo 'Stop!' . PHP_EOL;
      break;
    case 'yellow':
      echo 'Caution!' . PHP_EOL;
      break;
    case 'blue':
      echo 'Go!' . PHP_EOL;
      break;
    default:
      echo 'Wrong singnal' . PHP_EOL;
      break;
  }
  ?>

</body>
</html>