######   Intune ソフトウェアアップデート状況確認スクリプト##########
######   Create Date    2021/8/25                         ##########
######   Create Author  T.HATTORI                         ##########
###############################################################

#出力ファイルの定義
$result_file = "C:\work\20210825\result\Get_IntuneSoftwareUpdate.txt"
#メッセージの定義
$msg1 = "OK"
$msg2 = "NG"
$msg3 = "ファイルへの出力が成功しました"
$msg4 = "ファイルのへの出力に失敗しました"
$msg5 = "異常終了です"
$msg6 = "ファイルのOPENに失敗しました"
$msg7 = "ファイルのOPENに成功しました"
$msg8 = "ファイルのCLOSEに失敗しました"
$msg9 = "ファイルのCLOSEに成功しました"


#異常終了時のリターンコードの定義
$error_code = 1
#正常終了時のリターンコードの定義
$normal_code = 0

#####コマンド実行メソッド
function command {
    Get-IntuneSoftwareUpdateStatusSummary | Format-List | Out-File $result_File
    return_code($?)
}

#####リターンコードの実行メソッド(引数にコマンドのリターンコードを設定する)
function return_code($ans1) {
    if ($ans1 -eq "True") {
        Write-Host $msg1
    } else {
        Write-Host $msg2
    }
}

#####コマンドの結果をファイルに出力チェックのメソッド
function check_file {
    $flag = Test-Path $result_file
    if ($flag -eq "True"){
        Write-Host $msg3
    } else {
        Write-Host $msg4
        $ans2 = "False"
        critical_error($ans2)
    }
}

#異常終了(ファイルの作成に失敗、例外処理)の時のメソッド
function critical_error($ans3) {
    if ($ans3 -eq "False") {
        Write-Host $mgs5
        exit $error_code
    }
}

### ファイルの読み込みメソッド
function file_read {
    try
    {
        $file = New-Object System.IO.StreamReader($result_file)
    } 
    catch
    {
        Write-Host $msg6
        $ans = "False"
        critical_check($ans)
    }

    Write-Host $msg7
    while (($line = $file.ReadLine()) -ne $null)
    {
        $count += 1
    }

    try 
    {
        $file.Close()
    }
    catch
    {
        Write-Host $msg8
        $ans = "False"
        critical_check($ans)
    }
    Write-Host $msg9
    Write-Host "ファイルの行は"$count"です。"
}

#メインメソッド処理
command
check_file
file_read
exit $normal_code
