######Intune登録デバイス特定情報の収集スクリプト######
###### Create  date         2021/8/27
###### Create  Author       T.HATTORI
######

##日付データの取得
$date = Get-Date -Format "yyyyMMddHHmmss"
##出力結果ファイルの定義
$result_file = "C:\work\20210827\result\Managed_device$date.txt"

## メッセージの定義
$msg1 = "OK"
$msg2 = "NG"
$msg3 = "Intune登録デバイス取得情報ファイルの作成が成功しました"
$msg4 = "Intune登録デバイス取得情報ファイルの作成に失敗しました"
$msg5 = "異常終了"

##リターンコード
$normal_code=0
$error_code=1

#コマンド実行メソッド
function command {
    Get-IntuneManagedDevice | ft deviceName,managedDeviceOwnerType | Format-List | Out-File $result_file
    return_code($?)
}

#リターンコードメソッド
function return_code($ans1) {
    if ($ans1 -eq "True") {
        Write-Host $msg1
    } else {
        Write-Host $msg2
    }
}                
    
#ファイルの存在確認メソッド
function check_file {
    $flag = Test-Path $result_file
    if ($flag -eq "True") {
        Write-Host $msg3
    } else {
        Write-Host $msg4
        $ans = "False"
        critical_error($ans)
    }
}

## 異常終了メソッド
function critical_error($ans2) {
    if ($ans2 -eq "False") {
        Write-Host $msg5
        exit $error_code
    }
}
            
command
check_file
exit $normal_code    