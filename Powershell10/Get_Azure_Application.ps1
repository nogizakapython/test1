#####    Azure Application 情報収集スクリプト
#####    Create Date     2021/8/30
#####    Create Author   T.HATTORI

##変数の定義
$output_file = "C:\work\20210830\result\Azure_Application.txt"

#メッセージの変数定義
$msg1 = "OK"
$msg2 = "NG"
$msg3 = "ファイルの作成に成功しました"
$msg4 = "ファイルの作成に失敗しました"
$msg5 = "異常終了"

#リターンコードの定義
$normal_code = 0
$error_code = 1



function command {
    Get-AzureADApplication | Format-List | Out-File $output_file
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
    if (( Test-Path $output_file ) -eq "True") {
        Write-Host $msg3
    } else {
        Write-Host $msg4
        $flag = "False"
        critical_error($flag)
    }
}

function critical_error($ans2){
    if ($ans2 -eq "False") {
        Write-Host $msg5
        exit $error_code
    }
}

command
check_file

exit $normal_code
             