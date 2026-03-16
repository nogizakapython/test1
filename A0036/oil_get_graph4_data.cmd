::ICEnergy 月別油別販売価格情報取得コマンドスクリプト
:: 新規作成  2026/2/9  
:: Author by takao.hattori

@echo off

cd C:\EnergyTrend
set "RET=%ERRORLEVEL%"
:: データクリア処理
python oil_delete_data.py


if %RET%==0 (
    echo "OK"
) else (
    echo "ERROR"
    exit /b %RET%
) 

::作業対象月から直近2年分のデータを取得する処理
python oil_input_workmonth.py
if %RET%==0 (
    echo "OK"
) else (
    echo "ERROR"
    exit /b %RET%
) 
:: 直近2年分のデータを月別石油販売量累積データワークファイルに出力する処理
python oil_input_work_accout.py
if %RET%==0 (
    echo "OK"
) else (
    echo "ERROR"
    exit /b %RET%
) 
echo "Success! making Graph4 data!"