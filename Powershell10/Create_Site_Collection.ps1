########### SharePoint コレクションサイト新規作成スクリプト
########### Creata Date  2021/8/25
########### Create Author  T.HATTORI
####対象CSVファイルの定義
$input_file = "C:\work\20210825\csv\new_SPO_site.csv"
####サイト一覧ファイルの定義
$result_file = "C:\work\20210825\csv\result_SPO_site.csv"
#### CSVファイルの文字コードの定義
$chara_set="UTF8"
#メッセージ変数の定義
$msg1 = "OK"
$msg2 = "NG"
$msg3 = "異常終了でスクリプトを終了します"
$msg4 = "ファイルのインポート処理で例外処理が発生しました"
$msg5 = "サイトコレクション一覧ファイルの取得が成功しました"
$msg6 = "サイトコレクション一覧ファイルの取得に失敗しました"

#リターンコード
$normal_end=0
$error_end=1

function return_code($ans1) {
    if ($ans1 -eq "True") {
        Write-Host $msg1
    } else {
        Write-Host $msg2
    }
}

function critical_error($ans2) {
    if ($ans2 -eq "False"){
        Write-Host $msg3
        exit $error_code
    }
}

function check_create_site {
     Get-SPOSite | Export-Csv $result_file -Encoding $chara_set
     return_code($?)
}

function check_file {
    $flag2 = Test-Path $result_file
    if ($flag2 -eq "True"){
        Write-Host $msg5      
    } else {
        Write-Host $msg6
        $flag = "False"
        critical_error($flag)
    }
}

#Sharepoint サイト作成処理    
try{
    Import-Csv $input_file | ForEach-Object {New-SPOSite -Owner $_.Owner -StorageQuota $_.StorageQuota -Url $_.Url -NoWait -ResourceQuota $_.ResourceQuota -Template $_.Template -TimeZoneID $_.TimeZoneID -Title $_.Name}
##例外処理が発生した場合は例外処理ブロックで処理を行う
} catch {
    Write-Host $msg4
    $flag = "False"
    critical_error($flag)
}

#Sharepoint サイト作成確認
check_create_site
check_file

exit $normal_end
