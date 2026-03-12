<?php
/**
 * auth.php - 認証ヘルパー
 * Cookie の発行・検証・削除を担当
 */

require_once __DIR__ . '/config.php';

/**
 * 認証トークンを生成する
 * フォーマット: base64(username:expiry:signature)
 */
function generate_token(string $username): string {
    $expiry    = time() + COOKIE_LIFETIME;
    $payload   = $username . ':' . $expiry;
    $signature = hash_hmac('sha256', $payload, SECRET_KEY);
    return base64_encode($payload . ':' . $signature);
}

/**
 * トークンを検証し、有効なら username を返す。無効なら null。
 */
function verify_token(string $token): ?string {
    $decoded = base64_decode($token, true);
    if ($decoded === false) return null;

    $parts = explode(':', $decoded, 3);
    if (count($parts) !== 3) return null;

    [$username, $expiry, $signature] = $parts;

    // 期限切れチェック
    if ((int)$expiry < time()) return null;

    // 署名チェック（タイミング攻撃対策に hash_equals を使用）
    $expected = hash_hmac('sha256', $username . ':' . $expiry, SECRET_KEY);
    if (!hash_equals($expected, $signature)) return null;

    return $username;
}

/**
 * ログイン Cookie を発行する
 */
function set_auth_cookie(string $username): void {
    $token = generate_token($username);
    setcookie(
        COOKIE_NAME,
        $token,
        [
            'expires'  => time() + COOKIE_LIFETIME,
            'path'     => COOKIE_PATH,
            'secure'   => COOKIE_SECURE,
            'httponly' => COOKIE_HTTPONLY,
            'samesite' => 'Lax',
        ]
    );
}

/**
 * 認証 Cookie を削除してログアウトする
 */
function delete_auth_cookie(): void {
    setcookie(COOKIE_NAME, '', [
        'expires'  => time() - 3600,
        'path'     => COOKIE_PATH,
        'secure'   => COOKIE_SECURE,
        'httponly' => COOKIE_HTTPONLY,
        'samesite' => 'Lax',
    ]);
    unset($_COOKIE[COOKIE_NAME]);
}

/**
 * 現在ログイン中のユーザー名を返す。未ログインなら null。
 */
function get_logged_in_user(): ?string {
    if (empty($_COOKIE[COOKIE_NAME])) return null;
    return verify_token($_COOKIE[COOKIE_NAME]);
}

/**
 * ログイン必須ページ用ガード。
 * 未ログインならログイン画面にリダイレクト。
 */
function require_login(): string {
    $username = get_logged_in_user();
    if ($username === null) {
        header('Location: login.php?error=unauthorized');
        exit;
    }
    return $username;
}
