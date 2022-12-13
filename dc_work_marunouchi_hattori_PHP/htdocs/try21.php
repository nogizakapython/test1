<?php
    $food_genre = '';
    if (isset($_POST['food_genre'])) {
        $food_genre = htmlspecialchars($_POST['food_genre'], ENT_QUOTES, 'UTF-8');
    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>TRY21</title>
</head>
<body>
    <div>好きな食べ物のジャンルを選択してください。</div>
    <form method="post">
        <input type="radio" name="food_genre" value="未選択" <?php if ($food_genre === '未選択') { echo 'checked'; } ?> checked>未選択
        <input type="radio" name="food_genre" value="和食" <?php if ($food_genre === '和食') { echo 'checked'; } ?>>和食
        <input type="radio" name="food_genre" value="洋食" <?php if ($food_genre === '洋食') { echo 'checked'; } ?>>洋食
        <input type="radio" name="food_genre" value="中華" <?php if ($food_genre === '中華') { echo 'checked'; } ?>>中華
        <input type="radio" name="food_genre" value="エスニック" <?php if ($food_genre === 'エスニック') { echo 'checked'; } ?>>エスニック
        <input type="radio" name="food_genre" value="その他" <?php if ($food_genre === 'その他') { echo 'checked'; } ?>>その他
        <input type="submit" value="送信">
    </form>
    <?php if($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <div>好きな食べ物のジャンルは「<?php echo $food_genre; ?>」です。</div>
    <?php endif; ?>
</body>
</html>