########  Sharepoint Active Site Powershell #######
########  Create Date  2021/9/1 ###################
########  Create Author T.HATTORI #################

#CSVファイル出力先の定義
$result_csv = "C:\work\20210901\csv\Sharepoint_Site.csv"
#文字コードのセット
$char_set = "UTF8"

#標準出力にスクリプトの処理のメッセージを定義
$msg1 = "OK"
$msg2 = "NG"
$msg3 = "【例外処理】サイト情報用のファイル作成に失敗しました"
$msg4 = "異常終了です"
$msg5 = "正常に処理が完了しました"

###コマンド実行関数
function command {
    Get-SPOSIte | Export-csv $result_csv -Encoding $char_set
    return_code($?)
}

###リターンコード関数
function return_code($ans) {
    if ($ans -eq "True") {
        Write-Host $msg1
    } else {
        Write-Host $msg2
    }
}

### ファイルチェック関数
function file_check {
    try {
        $file = New-Object System.IO.StreamReader($result_csv)
    } catch [System.IO.FileNotFoundException] {
        Write-Host $msg3
        $flag = "False"
        critical_error($flag)
    }
}

### 異常終了関数
function critical_error($ans2) {
    if ($ans2 -eq "False") {
        Write-Host $msg4
        exit $error_code
    }
}
function normal_end {
    Write-Host $msg5
    exit $normal_code
}

### メイン処理
command
file_check
normal_end
