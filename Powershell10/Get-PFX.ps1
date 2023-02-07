######  PFX証明書ファイル情報スクリプト　######
######  Create Date     2021/8/27
######  Create Author   T.HATTORI
###日付の変数定義
$date = Get-date -Format "yyyyMMddHHmmss"
###出力ファイルの出力先の定義
$result_file="C:\work\20210827\result\Cert_PFX$date.txt"
###PFXファイル
$cert_file="C:\cert\efsdata.PFX"
### メッセージ出力の定義
$msg1 = "OK"
$msg2 = "NG"
$msg3 = "PFX証明書ファイル情報ファイルの取得に成功しました"
$msg4 = "PFX証明書ファイル情報ファイルの取得に失敗しました"
$msg5 = "異常終了"
#リターンコードの定義
$normal_code=0
$error_code=1

##リターンコードのメソッド
function return_code($ans){
    if ($ans -eq "True") {
        Write-Host $msg1
    } else {
        Write-Host $msg2
        delete_file
    }
}
##パスワードを間違えたときはファイル削除処理を行う
function delete_file {
    rm $result_file
}



##ファイルチェックのメソッド
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
##異常終了メソッド
function critical_error($ans2) {
    if ($ans2 -eq "False") {
        Write-Host $msg5
        exit $error_code
    }
}

try {    
    Get-PfxCertificate -filepath $cert_file | Out-File $result_file
    return_code($?)
} catch {
    Write-Host "例外処理が発生しました"
    $sw = "False"
    critical_error($sw)
}
check_file
    
exit $normal_code