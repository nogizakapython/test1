#バックアップ日付変数の定義
$Day = Get-Date -Format 'yyyyMMdd'
#バックアップ先のディレクトリ変数の定義
$TARGET_D = 'C:\Users\takao.hattori\OneDrive - Accenture\webbackup'
#スクリプト格納ディレクトリ変数の定義
$TARGET_D1 = $TARGET_D + "\" + $Day 
mkdir $TARGET_D1
if ($? -eq $true){
    Write-Host "OK"
} else {
    Write-Host "NG"
}
echo $TARGET_D1