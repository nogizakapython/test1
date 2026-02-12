::ICEnergy 月別油別販売価格情報取得コマンドスクリプト
:: 新規作成  2026/2/9  
:: Author by takao.hattori

@echo off

cd C:\EnergyTrend

python oil_delete_data.py
set "RET=%ERRORLEVEL%"

if %RET%==0 (
    echo "OK"
) else (
    echo "ERROR"
    exit /b %RET%
) 
python oil_input_workmonth.py
if %RET%==0 (
    echo "OK"
) else (
    echo "ERROR"
    exit /b %RET%
) 

python oil_input_work_accout.py
if %RET%==0 (
    echo "OK"
) else (
    echo "ERROR"
    exit /b %RET%
) 
echo "Success! making Graph4 data!"