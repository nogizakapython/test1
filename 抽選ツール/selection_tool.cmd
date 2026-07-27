@echo off

:: ============================================================
:: selection_tool1.py 起動用バッチ
:: Create Date : 2026/07/27
:: Author : takao.hattori
:: Thing   : selection_tool1.py を実行する
:: ============================================================


:: バッチファイルの配置フォルダへ移動
cd /d "%~dp0"

:: Pythonスクリプトの存在確認
if not exist "selection_tool.py" (
    echo Not exist selection_tool.py
    exit /b 1
)

::Pythonスクリプトを実行
python selection_tool.py

:: 実行結果確認用
