@echo off
chcp 65001 > nul
echo ============================================================
echo   社内ポータル デモサーバー 起動中...
echo ============================================================
echo   URL:        http://localhost:5000
echo   ユーザー名:  demo
echo   パスワード:  training2024
echo.
echo   停止するには Ctrl+C を押してください
echo ============================================================
echo.
cd /d "%~dp0"
call ..\.venv\Scripts\activate
python app.py
pause
