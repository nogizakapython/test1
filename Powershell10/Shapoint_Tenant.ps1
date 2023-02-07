####### sharepoint テナント情報一覧 ################
####### Create  Date  2021/8/27 ####################
####### Create Author T.HATTORI ####################
##出力ファイルの定義
$date = Get-date -format "yyyyMMddHHmmss"
$result_file = "C:\work\20210827\result\sharepoint$date.txt"
##メッセージの出力
$msg1 = "OK"
$msg2 = "NG"
$msg3 = "テナント情報一覧のファイル取得に成功しました"
$msg4 = "テナント情報一覧のファイル取得に失敗しました"
$msg5 = "異常終了"
$msg6 = "ファイルのOPENに失敗しました"
$msg7 = "ファイルのOPENに成功しました"
$msg8 = "ファイルのCLOSEに失敗しました"
$msg9 = "ファイルのCLOSEに成功しました"

##リターンコードの定義
$normal_code=0
$error_code=1

##コマンドメソッド
function command {
    Get-PnPGroup | Format-List | Out-File $result_file
    return_code($?)
}

##リターンコードメソッド
function return_code($ans) {
    if ($ans -eq "True") {
        Write-Host $msg1
    } else {
        Write-Host $msg2
    }
}

##出力結果ファイルの存在確認メソッド
function check_file {
    $flag = Test-path $result_file
    if ($flag -eq "True") {
        Write-Host $msg3
    } else {
        Write-Host $msg4
        $sw = "False"
        critical_error($sw)
    }
}

## 異常終了メソッド
function critical_error($ans1) {
    if ($ans1 -eq "False") {
        Write-Host $msg5
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

command
check_file
file_read

exit $normal_code
