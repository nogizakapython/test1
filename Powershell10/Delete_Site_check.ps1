##### サイト削除情報Powershell Script
#####  Create  Date    2021/8/24
#####  Create  Author  T.HATTORI
#### 出力元ファイル
$input_file ="C:\work\20210824\Delete_Site.txt"
#### 削除されたサイトの行数変数
$count = 0
#### 標準出力メッセージ
$msg1 = "読み込むファイルが存在します"
$msg2 = "読み込むファイルが存在しません"
$msg3 = "異常終了でスクリプトを終了します"
$msg4 = "ファイルのOPENに失敗しました"
$msg5 = "ファイルのOPENに成功しました"
$msg6 = "ファイルのCLOSEに失敗しました"
$msg7 = "ファイルのCLOSEに成功しました"
####  ファイルの存在確認チェックメソッド
function file_check {
    $flag = test-path $input_file
    if ($flag -eq "True"){
        Write-Host $msg1
    } else {
        Write-Host $msg2
        $code = "False"
        critical_error($code)
    }
}
#### 異常終了メソッド
function critical_error($ans2){
    if ($ans2 -eq "True"){
        Write-Host $msg3
        exit 1
    }
}

file_check
#####ファイルを読み込む処理
try
{
    $file = New-Object System.IO.StreamReader($input_file)
} 
catch
{
    Write-Host $msg4
    $ans = "False"
    critical_check($ans)
}

Write-Host $msg5
while (($line = $file.ReadLine()) -ne $null)
{
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
Write-Host $msg7
Write-Host "ファイルの行は"$count"です。"
exit 0