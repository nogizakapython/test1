########################################
##   File Lotation and delete script  ##
##                                    ##
##   New     2023/5/31                ##
##   Modefy  2023/6/1  (削除の際にサブディレクトリまで削除する ##
##   Modefy  2023/6/2  (スクリプトパスの設定) ##
##   Modefy  2023/6/6  (削除ディレクトリ条件の追加) ##
##   Modefy  2023/6/12 (削除フラグの不備を解消)  ## 
##   Create  Takao.Hattori            ##
########################################

#バックアップ先ディレクトリの定義
$DIRECTORY = 'C:\Users\takao.hattori\OneDrive - Accenture\webbackup'
#Powershellスクリプトの格納先ディレクトリの定義
$SCRIPT_PATH = 'C:\Users\takao.hattori\OneDrive - Accenture\script'
#バックアップ保持日数変数の定義
$DAYS = 1
Get-ChildItem $DIRECTORY -Recurse | Where-Object {($_.Mode -eq "d----l") -or ($_.Mode -eq "da---l") -and ($_.LastWriteTime -lt (Get-Date).AddDays(-1 * $DAYS))} | Remove-Item -Recurse -force
if ($? -eq $true) {
    Write-Host "OK Delete"
} else {
    Write-Host "NG not Delete"
}

cd $DIRECTORY
$Day = Get-Date -Format 'yyyyMMdd'
#ディレクトリ存在チェック
$flag = Test-Path $Day
#バックアップディレクトリがなければ作成、あればそのまま
if ($flag -eq $true) {
    Write-Host "Still Directory"
} else {
    mkdir $Day
}
cd $SCRIPT_PATH
