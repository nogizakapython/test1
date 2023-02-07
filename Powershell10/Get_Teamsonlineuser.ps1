####### Teams online user情報取得スクリプト
####### Create Date    2021/8/23
####### Create Author  T.HATTORI
#### 変数の定義
$result_file = "C:\work\20210823\result\Teams_Online_User.txt"
$msg1 = "OK"
$msg2 = "NG"
$msg3 = "ファイルの作成に成功しました"
$msg4 = "ファイルの作成に失敗しました"
$msg5 = "ファイルのオープンに失敗しました"
$msg6 = "ファイルのクローズに失敗しました"
$msg7 = "異常終了です"
#行数カウント
$count = 0
#CSVファイルの出力先フォルダーを設定する。
$chara_set = "UTF8"
###### コマンドの実行とリターンコードメソッド
function get_command{
    Get-CsOnlineUser | Format-List | Out-File $result_file
    return $?
}
######  リターンコード確認メソッド
function return_code($ans1) {
    if ($ans1 -eq "True") {
        Write-Host $msg1
    } else {
        Write-Host $msg2
    }
}
######  ファイルの存在確認確認メソッド
function check_file {
    $flag = Test-path $result_file
    if ($flag -eq "True") {
        Write-Host $msg3
    } else {
        Write-Host $msg4
        $error = "False"
        critical_end($error)
    }
}
######   異常終了メソッド
function critical_end($ans2)  {
    if ($ans2 = "False") {
        Write-Host $msg7
        exit 1
     }
}
##### メイン処理
$code1 = get_command
return_code($code1)
check_file
#####ファイルを読み込む
try
{
    $file = New-Object System.IO.StreamReader($result_file)
} 
catch
{
    Write-Host $msg5
    $ans = "False"
    critical_check($ans)
}

Write-Host "ファイルを開くのに成功しました"

while (($line = $file.ReadLine()) -ne $null)
{
    #Write-Host $line
    $count += 1
}

#####ファイルを閉じる時に例外処理でファイルが閉じることを確認する。
try 
{
    $file.Close()
}
catch
{
    Write-Host $msg6
    $ans = "False"
    critical_check($ans)
}

Write-Host "ファイルが正常に閉じました"
Write-Host "ファイルの行は"$count"です。"
exit 0