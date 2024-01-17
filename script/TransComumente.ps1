########################################
##   TransComunicator file mentenance ##
##                                    ##
##   New     2023/7/21                ##
##   Create  Takao.Hattori            ##
########################################

#バックアップ先ディレクトリの定義
$DIRECTORY = 'C:\Users\takao.hattori\TransComunicator'
#Powershellスクリプトの格納先ディレクトリの定義
$SCRIPT_PATH = 'C:\Users\takao.hattori\OneDrive - Accenture\script'
#バックアップ保持日数変数の定義
$DAYS = 1
Get-ChildItem $DIRECTORY -Recurse | Where-Object {($_.Mode -eq "-a----") -and ($_.LastWriteTime -lt (Get-Date).AddDays(-1 * $DAYS))} | Remove-Item -Recurse -force
if ($? -eq $true) {
    Write-Host "OK Delete"
} else {
    Write-Host "NG not Delete"
}

cd $SCRIPT_PATH
if ($? -eq $true) {
    Write-Host "OK"
} else {
    Write-Host "NG"
}
