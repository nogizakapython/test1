#################################################################
#   Portal Site  Backup Script
#   New          2023/5/25
#   Modefy       2023/5/26 ディレクトリ関数追加、バックアップ処理確認処理を追加
#   Modefy       2023/5/29 バックアップ前に前のバックアップファイルを削除する処理を追加
#   Modefy       2023/5/29 前のバックアップファイル削除確認処理を追加
#   Modefy       2023/6/5  削除するディレクトリの後ろに「\」を追加
#   Author       Takao Hattori
#################################################################

#ベースディレクトリ変数の定義
$BASE_D = 'C:\Users\takao.hattori\OneDrive - Accenture'
#バックアップ対象のディレクトリ変数の定義
$BACKUP_D = 'C:\Users\takao.hattori\OneDrive - Accenture\MyWeb'
#バックアップ日付変数の定義
$Day = Get-Date -Format 'yyyyMMdd'
#バックアップ先のディレクトリ変数の定義
$TARGET_D = 'C:\Users\takao.hattori\OneDrive - Accenture\webbackup'
#スクリプト格納ディレクトリ変数の定義
$SCRIPT_D = 'C:\Users\takao.hattori\OneDrive - Accenture\script'
#バックアップ先の日付付きディレクトリ変数の定義
$TARGET_D1 = $TARGET_D + "\" + $Day + "\" 

###############メイン処理##########################
#ディレクトリ関数
function check_backupdir {
    Test-Path $TARGET_D1
    if ($? -eq $true) {
        Write-Host "There is still backup Directory"
        return $true
    } false {
        Write-Host "There is not backup Directory"
        return $false
    }        
}

#ディレクトリ関数
function delete_backupdir {
    Remove-Item $TARGET_D1 -Recurse
    if ($? -eq $true) {
        Write-Host "There is still backup Directory"
        return $true
    } else {
        Write-Host "There is not backup Directory"
        return $false
    }        
}
#開始メッセージ
Write-Host "Portal Site Backup Procedure START"

#カレントディレクトリの変更
cd $TARGET_D
#処理正常終了確認
if ($? -eq $true){
    Write-Host "Change Directory OK"
} else {
    Write-Host "Change Directory NG"
}

#前バックアップファイルの削除
$a = delete_backupdir
if ($a -eq $true){
    Write-Host "OK. delete previous backup Directory"
} else {
    Write-Host "NG. Do not delete previous backup Directory"
}

#削除処理確認処理
$r = check_backupdir

if ($r -eq $true){
    Write-Host "OK. Success Delete previous backup Directory"
} else {
    Write-Host "NG. Do not Success Delete previous backup Directory"
}


#バックアップ処理
Copy-Item $BACKUP_D $DAY -Recurse
#バックアップ正常終了確認
if ($? -eq $true){
    Write-Host "backup Portal Site OK"
} else {
    Write-Host "backup Portal Site NG"
}

#バックアップ完了チェック
$b = check_backupdir

if ($b -eq $true){
    Write-Host "OK. processing backup procedure"
} else {
    Write-Host "NG. Do not processing backup prodedure"
}

#スクリプトディレクトリに変更
cd $SCRIPT_D
#処理正常終了確認
if ($? -eq $true){
    Write-Host "Change Directory OK"
} else {
    Write-Host "Change Directory NG"
}

#終了メッセージ
Write-Host "Portal Site Backup Procedure END"