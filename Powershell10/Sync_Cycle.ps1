##### Sync Azure Force Sync  script ######
##### Create Date     2021/9/8      ######
##### Create Author   T.HATTORI     ######
#出力ファイルの定義
$date = Get-Date -Format "yyyyMMddHHmmss"
$result_file="C:\work\20210908\result\force_Sync$date.txt"

#リターンコードの定義
$normal_code = 0
$error_code = 1

#Set-ADSyncSchedulerコマンド関数
function command1($ans) {
    if ($ans -ne $null) {
        Set-ADSyncScheduler -CustomizedSyncCycleInterval $ans | Out-File -Append $result_file
        return_code($?)
    } else {
        Write-Host "Please input HH:MM:SS within Setting 0:30:00 Over"
    }
}
#Get-ADSyncSchedulerコマンド関数
function command2 {
    Get-ADSyncScheduler | Out-File $result_file -Append
    return_code($?)
}
#リターンコード関数
function return_code($ans1) {
    if ($ans1 -eq "True") {
        Write-Host "OK"
    } else { 
        Write-Host "NG"
    }
}
#出力ファイル確認関数
function check_file {
    $flag = Test-Path $result_file
    if ($flag -eq "True") {
        Write-Host "Get output file"
    } else {
        Write-Host "Not Get output file"
        critical_error("False")
    }
}
#異常終了関数
function critical_error($ans2) {
    if ($ans2 -eq "False") {
        Write-Host "Critical Error"
        exit $error_code
    }
}
##メイン処理
Write-Host "---------START------------"
while($true){
    $r1 = Read-Host "input HH:MM:SS Over 00:30:00"
    if ($r1 -ne $null) {
        command1($r1)
        break
    }
}

command2
check_file

exit $normal_end     
             