######   Intune モバイルアプリ取得スクリプト                        ##########
######   Create Date    2021/8/25                                   ##########
######   Create Author  T.HATTORI                                   ##########
##############################################################################
#出力ファイルの定義
$result_file = "C:\work\20210825\result\Get-IntuneMobileAppCategory.txt"
#ファイルの行数変数
$count =0
#メッセージの定義
$msg1="OK"
$msg2="NG"
$msg3="ファイルの取得に成功しました"
$msg4="ファイルの取得に失敗しました"
$msg5="例外処理が発生したので処理を異常終了しました"
$msg6="ファイルのOPENに失敗しました"
$msg7="ファイルのOPENに成功しました"
$msg8="ファイルのCLOSEに失敗しました"
$msg9="ファイルのCLOSEに成功しました"
#リターンコードの定義
$normal_code=0
$error_code=1
# コマンドメソッド
function command {
    Get-IntuneMobileAppCategory | Out-File $result_file
    return_code($?)
}
#リターンコードのメソッド
function return_code($ans1){
    if ($ans1 -eq "True"){
        Write-Host $msg1
    } else {
        Write-Host $msg2
    }
}
#出力ファイルチェックメソッド
function check_file {
    $flag1 = Test-Path $result_file
    if ($flag1 -eq "True"){
        Write-Host $msg3
    } else {
        Write-Host $msg4
        $ans2 = "False"
        critical_error($ans2)
    }
}

#クリティカルエラーのメソッド
function critical_error($ans3){
    if ($ans3 -eq "False") {
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

#メインメソッド処理
command
check_file
file_read
exit $normal_code   
