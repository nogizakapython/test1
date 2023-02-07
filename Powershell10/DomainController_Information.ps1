###### Active Directory Domain Information  ######
###### Create Date      2021/9/9            ######
###### Create Author    T.HATTORI           ######
##出力ファイルの定義
$result_file="C:\work\20210909\result\DomainController_infomation.txt"
##メッセージの定義
$msg1="OK"
$msg2="NG"
$msg3="Sccess Output File"
$msg4="Failure Output File"
$msg5="Critical end"
$msg6="-------------START---------------"
$msg7="-------------END---------------"

##リターンコードの定義
$normal_code=0
$error_code=1


function command {
    Get-ADDomainController | Format-List | Out-File $result_file
    return_code($?)
}

function return_code($ans) {
    if ($ans -eq "True") {
        Write-Host $msg1
    } else {
        Write-Host $msg2
    }
}

function check_file {
    $check_flag = Test-Path $result_file
    if ($check_flag -eq "True") {
        Write-Host $msg3
    } else {
        Write-Host $msg4
        critical_error("False")
    }
}

function critical_error($ans2) {
    if ($ans2 -eq "False") {
        Write-Host $msg5
        exit $eror_code
    }
}

function kaishi {
    Write-Host $msg6
}

function owari {
    Write-Host "----------END-----------"
}

###メイン処理###

kaishi
command
check_file
owari

exit $normal_code
       