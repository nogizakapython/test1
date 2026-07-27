:: コマンドプロンプトで、コマンドの実行結果を変数に代入し、標準出力で出力する
:: Create 2026/7/27
:: Author by takao.hattori


@echo off
for /f "usebackq" %%i in (`cd`) do set DIRECTORY=%%i
echo %DIRECTORY%