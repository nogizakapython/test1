<?php
/**
 * login.php - ログイン画面
 */

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/auth.php';

// すでにログイン済みならダッシュボードへ
if (get_logged_in_user() !== null) {
    header('Location: dashboard.php');
    exit;
}

$error = '';

// POSTされた場合の認証処理
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || $password === '') {
        $error = 'ユーザー名とパスワードを入力してください。';
    } elseif (!isset($USERS[$username]) || !password_verify($password, $USERS[$username]['password'])) {
        // ユーザー不明とパスワード不一致を同じメッセージにして列挙攻撃を防ぐ
        $error = 'ユーザー名またはパスワードが正しくありません。';
    } else {
        // 認証成功 → Cookie を発行してリダイレクト
        set_auth_cookie($username);
        header('Location: dashboard.php');
        exit;
    }
}

// GETパラメータによるエラーメッセージ
if (empty($error) && isset($_GET['error'])) {
    if ($_GET['error'] === 'unauthorized') {
        $error = 'このページにアクセスするにはログインが必要です。';
    }
}

// XSS対策用ヘルパー
function h(string $s): string {
    return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            font-family: 'Segoe UI', sans-serif;
        }

        .card {
            background: #fff;
            border-radius: 12px;
            padding: 2.5rem 2rem;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.4);
        }

        .card h1 {
            text-align: center;
            margin-bottom: 1.8rem;
            font-size: 1.6rem;
            color: #0f3460;
        }

        .error-msg {
            background: #fdecea;
            border-left: 4px solid #e53935;
            color: #c62828;
            padding: .75rem 1rem;
            border-radius: 4px;
            margin-bottom: 1.2rem;
            font-size: .9rem;
        }

        label {
            display: block;
            font-size: .85rem;
            font-weight: 600;
            color: #333;
            margin-bottom: .3rem;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: .65rem .9rem;
            border: 1.5px solid #ccc;
            border-radius: 6px;
            font-size: 1rem;
            transition: border-color .2s;
            margin-bottom: 1.1rem;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #0f3460;
        }

        .checkbox-row {
            display: flex;
            align-items: center;
            gap: .5rem;
            margin-bottom: 1.4rem;
            font-size: .9rem;
            color: #555;
        }

        button[type="submit"] {
            width: 100%;
            padding: .75rem;
            background: #0f3460;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background .2s;
        }

        button[type="submit"]:hover { background: #16213e; }

        .hint {
            margin-top: 1.5rem;
            background: #f0f4ff;
            border-radius: 6px;
            padding: .8rem 1rem;
            font-size: .8rem;
            color: #555;
        }

        .hint strong { color: #0f3460; }
    </style>
</head>
<body>
<div class="card">
    <h1>&#128274; ログイン</h1>

    <?php if ($error !== ''): ?>
        <div class="error-msg"><?= h($error) ?></div>
    <?php endif; ?>

    <form method="post" action="login.php">
        <label for="username">ユーザー名</label>
        <input
            type="text"
            id="username"
            name="username"
            placeholder="username"
            value="<?= h($_POST['username'] ?? '') ?>"
            autocomplete="username"
            required
        >

        <label for="password">パスワード</label>
        <input
            type="password"
            id="password"
            name="password"
            placeholder="••••••••"
            autocomplete="current-password"
            required
        >

        <button type="submit">ログイン</button>
    </form>

    <div class="hint">
        <strong>テスト用アカウント</strong><br>
        admin / password123<br>
        user1 / user1pass
    </div>
</div>
</body>
</html>
