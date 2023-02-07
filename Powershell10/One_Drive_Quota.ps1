##### One Drive Userの容量制限チェックPowershell
##### Create  Date  2021/8/24
##### Create  Author  T.HATTORI

###出力ファイルの定義
$result_file = "C:\work\20210824\result\OneDrive_User.csv"
###OneDrive所有ユーザー
$USER = @('服部隆央','Takao Hattori','Hattori','takao hattori')
###メッセージ変数
$msg1="OK"
$msg2="NG"
$msg3="ファイルの取得に成功しました"
$msg4="ファイルの取得に失敗しました"
$msg5="異常終了です"
###文字コードの設定変数の定義
$char_set="UTF8"

#####コマンドメソッド
function command {
    foreach($line in $USER) {
        Get-PnPUserOneDriveQuota -Account $line | Export-Csv $result_file -Append -Encoding $char_set
        return_code($?)
    }
}
####リターンコードメソッド
function return_code($ans1){
    if ($ans1 -eq "True") {
        Write-Host $msg1
    } else {
        Write-Host $msg2
    }
}
####ファイルの存在確認メソッド
function check_file {
    $ans2 = Test-Path $result_file
    if ($ans2 -eq "True") {
        Write-Host $msg3
    } else {
        Write-Host $msg4
        $flag = "False"
        critical_error($flag)
    }
}
####クリティカルエラー
function critical_error($ans3){
    if ($ans3 -eq "False"){
        Write-Host $msg5
        exit 1
    }
}

####メイン処理
command
check_file
exit 0


