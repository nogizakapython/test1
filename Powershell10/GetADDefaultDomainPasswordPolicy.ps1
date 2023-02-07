####### パスワードポリシー情報取得スクリプト
####### Create  Date     2021/9/9
####### Create  Author   T.HATTORI

#出力ファイルメソッド
$result_file ="C:\work\20210909\result\Get-ADDefaultDomainPasswordPolicy.txt"

#コマンドメソッド
function command {
    Get-ADDefaultDomainPasswordPolicy | Format-List | Out-File $result_file
    return_code($?)
}

#リターンコードメソッド
function return_code($ans) {
    if ($ans -eq "True") {
        Write-Host "OK"
    } else {
        Write-Host "NG"
    }
}

#出力ファイルメソッド
function check_file {
    if (( Test-Path $result_file ) -eq "True") {
        Write-Host "Sccess Output File"
    } else {
        Write-Host "Failure Output File"
        critical_error("False")
    }
}

#クリティカルエラーメソッド
function critical_error($ans2) {
    if ($ans2 -eq "False") {
        Write-Host "Critical End"
        exit 0
    }
}

#開始メソッド
function kaishi {
    Write-Host "------START------"
}

#終わりメソッド
function owari {
    Write-Host "------END------"
}

###メイン処理###
kaishi
command
check_file
owari

exit 0                    