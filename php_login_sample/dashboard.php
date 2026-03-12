<?php
/**
 * dashboard.php - ログイン後のメインページ（保護されたページのサンプル）
 */

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/auth.php';

// ログイン必須 → 未認証なら login.php へ自動リダイレクト
$username = require_login();
$user     = $USERS[$username];

function h(string $s): string {
    return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}

// Cookie の有効期限を取得して表示用に変換
$expiry = 'N/A';
if (!empty($_COOKIE[COOKIE_NAME])) {
    $decoded = base64_decode($_COOKIE[COOKIE_NAME], true);
    if ($decoded) {
        $parts = explode(':', $decoded, 3);
        if (isset($parts[1])) {
            $expiry = date('Y-m-d H:i:s', (int)$parts[1]);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ダッシュボード</title>
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f4f6fb;
            color: #333;
        }

        header {
            background: #0f3460;
            color: #fff;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 { font-size: 1.2rem; }

        header a {
            color: #fff;
            text-decoration: none;
            background: rgba(255,255,255,.2);
            padding: .4rem .9rem;
            border-radius: 5px;
            font-size: .9rem;
            transition: background .2s;
        }

        header a:hover { background: rgba(255,255,255,.35); }

        main {
            max-width: 860px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .welcome {
            background: #fff;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 2px 12px rgba(0,0,0,.08);
            margin-bottom: 1.5rem;
        }

        .welcome h2 { margin-bottom: .5rem; color: #0f3460; }

        .badge {
            display: inline-block;
            background: #e8f0fe;
            color: #1a73e8;
            border-radius: 20px;
            padding: .2rem .8rem;
            font-size: .8rem;
            font-weight: 600;
            margin-left: .5rem;
            vertical-align: middle;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1rem;
        }

        .info-card {
            background: #fff;
            border-radius: 10px;
            padding: 1.4rem 1.6rem;
            box-shadow: 0 2px 12px rgba(0,0,0,.08);
        }

        .info-card .label {
            font-size: .75rem;
            text-transform: uppercase;
            letter-spacing: .05em;
            color: #888;
            margin-bottom: .3rem;
        }

        .info-card .value {
            font-size: 1rem;
            font-weight: 600;
            color: #0f3460;
            word-break: break-all;
        }
    </style>
</head>
<body>

<header>
    <h1>&#127968; ダッシュボード</h1>
    <a href="logout.php">ログアウト</a>
</header>

<main>
    <div class="welcome">
        <h2>
            ようこそ、<?= h($user['display_name']) ?> さん！
            <span class="badge"><?= h($user['role']) ?></span>
        </h2>
        <p style="margin-top:.6rem;color:#555;font-size:.95rem;">
            認証 Cookie によって保護されたページです。
        </p>
    </div>

    <div class="info-grid">
        <div class="info-card">
            <div class="label">ユーザー名</div>
            <div class="value"><?= h($username) ?></div>
        </div>
        <div class="info-card">
            <div class="label">Cookie 名</div>
            <div class="value"><?= h(COOKIE_NAME) ?></div>
        </div>
        <div class="info-card">
            <div class="label">Cookie 有効期限</div>
            <div class="value"><?= h($expiry) ?></div>
        </div>
        <div class="info-card">
            <div class="label">Cookie 値（先頭40文字）</div>
            <div class="value">
                <?= h(substr($_COOKIE[COOKIE_NAME] ?? '', 0, 40)) ?>...
            </div>
        </div>
    </div>
</main>

</body>
</html>
