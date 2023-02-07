#######   デバイスコンプライアンスポリシー情報取得スクリプト
#######   Create  Date  2021/8/27
#######   Create  Author  T.HATTORI

##出力ファイル
$result_file = "C:\work\20210827\result\Device_ComplicancePolicy.txt"

##出力メッセージ
$msg1 = "OK"
$msg2 = "NG"
$msg3 = "コンプライアンスポリシー情報取得ファイルの取得に成功しました"
$msg4 = "コンプライアンスポリシー情報取得ファイルの取得に失敗しました"
$msg5 = "異常終了により、スクリプトを終了します"
$msg6 = "ファイルのOPENに失敗しました"
$msg7 = "ファイルのCLOSEに失敗しました"


##リターンコードの定義
$normal_code =0
$error_code = 1

### コマンド実行メソッド
function command {
    Get-IntuneDeviceCompliancePolicy | Format-List | Out-File $result_file
    return_code($?)
}
### リターンコードメソッド
function return_code($ans1) {
    if ($ans1 -eq "True") {
        Write-Host $msg1
    } else {
        Write-Host $msg2
    }
}
### ファイルの存在管理チェックメソッド
function check_file {
    $flag = test-path $result_file
    if ($flag -eq "True"){
        Write-Host $msg3
    } else {
        Write-Host $msg4
        $flag = "False"
        critical_error($flag)
    }
}
##異常終了メソッド
function critical_error($ans1) {
    if ($ans1 -eq "False") {
        Write-Host $msg5
        exit $error_code
    }
}

#ファイルの読み込み、closeメソッド
function file_read {
    $file = New-Object System.IO.StreamReader($result_file)
    
    try {
        while (($line = $file.ReadLine()) -ne $null) {
        }
    }
    catch {
        Write-Host $msg6
        $flag = "False"
        critical_error($flag)
    }
    
    try {
        $file.Close()
    } catch {
        Write-Host $msg7
        $flag = "False"
        critical_error($flag)
    }
}


command
check_file
file_read
Write-Host "正常終了します"
exit $normal_code
                                    