####　同期スケジュールを一時的に停止、再開するスクリプト ####
####  Create   date       2021/9/7
####  Create   Author     T.HATTORI
#############################################################

####出力ファイルの定義
$date = Get-date -format "yyyyMMddHHmmss"
$result_file="c:\work\20210907\result\ADSync$date.txt"

#戻り値の定義
$code = 1
$sw_code = 0

#リターンコードの定義
$normal_code = 0
$error_code = 1

#標準出力メッセージ
$msg1="Without true or false flag"
$msg2="OK"
$msg3="NG"
$msg4="Sccess Output File"
$msg5="Failure Output File"
$msg6="Critical Error"
$msg7="-------START---------"
$msg8="-------END-----------"

function command1 ($ans1) {
    if ($ans1 -eq "false") {
        Set-ADSyncScheduler -SyncCycleEnabled $false
        return_code($?)
    } elseif($ans1 -eq "true") {
        Set-ADSyncScheduler -SyncCycleEnabled $true
        return_code($?)
    } else {
        Write-Host $msg1
    }
}

function command2 {
    Get-ADSyncScheduler | Out-File $result_file
    return_code($?)
}

function return_code($ans1) {
     if ($ans1 -eq "True") {
        Write-Host $msg2
     } else {
        Write-Host $msg3
     }
}

function check_file {
    $ans2 = Test-Path $result_file
    if ($ans2 -eq "True") {
        Write-Host $msg4
    } else {
        Write-Host $msg5
        critical_error("False")
    }
}

function critical_error($ans2) {
    if ($ans2 -eq "False") {
        Write-Host $msg6
        exit $error_code
    }
}

function start1 {
    Write-Host $msg7
}

function end1 {
    Write-Host $msg8
}

 start1
 while ($sw_code -eq 0){
    $ans1 = Read-Host "Please input (true or false)"
    command1($ans1)
    if (($ans1 -eq "true") -or ($ans1 -eq "false")) {
        $sw_code = 1
    }
}
command2
check_file
end1
                                