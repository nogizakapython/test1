@echo off

:: ============================================================
:: selection_tool1.py 起動用バッチ
:: Create Date : 2026/7/27
:: Author : takao.hattori
:: Thing   : selection_tool1.py を実行する
:: ============================================================


:: バッチファイルの配置フォルダへ移動
cd /d "%~dp0"

:: Pythonスクリプトの存在確認
if not exist selection_tool_new2.py (
    echo Not exist selection_tool_new2.py
    exit /b 1
)

::Pythonスクリプトを実行
python selection_tool_new2.py

:: 実行結果確認用
notepad result.txt