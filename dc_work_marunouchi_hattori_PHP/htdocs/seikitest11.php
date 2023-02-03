<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>正規表現テスト10</title>
</head>
<body>
  <?php
    $input = 'Call us at 03-3001-1256 or 03-3015-3222';

    $pattern = '/\d{2}-\d{4}-\d{4}/';
    preg_match_all($pattern,$input,$matches);
    print_r($matches);
  ?>
</body>
</html>
