<?php
/**
 * config.php - 設定ファイル
 * ユーザー情報・Cookie設定を管理
 */

// Cookie設定
define('COOKIE_NAME',     'auth_token');
define('COOKIE_LIFETIME', 60 * 60 * 24 * 7); // 7日間（秒）
define('COOKIE_PATH',     '/');
define('COOKIE_SECURE',   false); // HTTPS環境では true に変更
define('COOKIE_HTTPONLY', true);  // JavaScriptからのアクセスを禁止

// 秘密鍵（本番環境では長くランダムな文字列に変更すること）
define('SECRET_KEY', 'your-secret-key-change-in-production');

// ユーザー一覧（本番環境ではデータベースを使用すること）
// パスワードは password_hash() で生成したハッシュ値
$USERS = [
    'admin' => [
        'password' => password_hash('password123', PASSWORD_DEFAULT),
        'display_name' => '管理者',
        'role' => 'admin',
    ],
    'user1' => [
        'password' => password_hash('user1pass', PASSWORD_DEFAULT),
        'display_name' => '一般ユーザー',
        'role' => 'user',
    ],
];
