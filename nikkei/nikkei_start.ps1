#####  日経人事異動、Powershell用実行スクリプト
#####  Create date 2026/7/30  takao.hattori
#############################################

$home_dir = Get-Location | Select-String "C*"
cd $home_dir
if ($? -eq "True"){
    Write-Host "OK"
} else {
    Write-Host "NG"
}

python .\nikkei_start.py