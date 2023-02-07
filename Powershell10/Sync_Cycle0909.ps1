##### Sync Azure Force Sync  script ######
##### Create Date     2021/9/9      ######
##### Create Author   T.HATTORI     ######
#出力ファイルの定義
$date = Get-Date -Format "yyyyMMddHHmmss"
$result_file="C:\work\20210908\result\Sync_Sycle$date.txt"

#リターンコードの定義
$normal_code = 0
$error_code = 1
$count=0


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
    $count = 0
    $const_count = 0
    Write-Host "0から24までの数字を入力してください"
    $hour = Read-Host
    $hour2 = $hour 
    if ($hour -lt 10 ) {
	$hour = "0" + $hour
        $count += 1
    } elseif ($hour -lt 24 ){
        $count += 1
    } elseif (($hour -lt 0 ) -or ($hour -gt 23)) {
        Write-Host "NG"
    }

    Write-Host "0から59までの数字を入力してください"
    $minutes = Read-Host
    if (($minutes -ge 0) -and ($minutes -lt 10 )) {
        $minutes = "0" + $minutes
        $count += 1
    } elseif ( $minutes -lt 60 ) {
        $count += 1
    } else{
        Write-host "NG"
    }

    Write-Host "0から59までの数字を入力してください"
    $seconds = Read-Host 
    if (($seconds -ge 0) -and($seconds -lt 10 )) {
        $seconds = "0" + $seconds
        $count += 1 
    } elseif ( $seconds -lt 60 ) {
        $count += 1
    } else {
        Write-host "NG"
    }

    #30分より短い間隔を入力した場合はループを回すようにフラグを立てる
    if (($hour2 -eq 0 ) -and ($minutes -lt 30 )) {
        $const_count  += 1
        Write-Host "NG"
    }
    
    #同期間隔を30分以上の場合は、コマンドを実行してループから抜ける     
    if (($count -eq 3) -and ($const_count -eq 0)) {
        $ans = $hour + ":" + $minutes + ":" + $seconds
        command1($ans)
        break
    }
}
command2
check_file

exit $normal_end     
             