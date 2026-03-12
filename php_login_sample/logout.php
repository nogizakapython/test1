<?php
/**
 * logout.php - ログアウト処理
 */

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/auth.php';

delete_auth_cookie();

// ログイン画面へリダイレクト
header('Location: login.php');
exit;
