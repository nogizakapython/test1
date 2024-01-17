########################################
##   File Lotation and delete script  ##
##                                    ##
##   New     2023/5/31                ##
##   Modefy  2023/6/1  (削除の際にサブディレクトリまで削除する ##
##   Modefy  2023/6/2  (スクリプトパスの設定) ##
##   Modefy  2023/6/6  (削除ディレクトリ条件の追加) ##
##   Create  Takao.Hattori            ##
########################################


$DIRECTORY = 'C:\Users\takao.hattori\OneDrive - Accenture\webbackup'
$SCRIPT_PATH = 'C:\Users\takao.hattori\OneDrive - Accenture\script'
$DAYS = 1
Get-ChildItem $DIRECTORY -Recurse | Where-Object {($_.Mode -eq "d----l") -or ($_.Mode -eq "da---l") -and ($_.LastWriteTime -lt (Get-Date).AddDays(-1 * $DAYS))} | Remove-Item -Recurse -force
if ($? -eq $true) {
    Write-Host "OK Delete"
} else {
    Write-Host "NG not Delete"
}

cd $DIRECTORY
$Day = Get-Date -Format 'yyyyMMdd'
$flag = Test-Path $Day
if ($flag -eq $true) {
    Write-Host "Still Directory"
} else {
    mkdir $Day
}
cd $SCRIPT_PATH
