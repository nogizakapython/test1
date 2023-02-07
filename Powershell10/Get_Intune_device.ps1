#####  Intuneのデバイス登録情報取得スクリプト
#####  Create Date      2021/8/23
#####  Create Author    T.HATTORI
##変数の定義
$date = Get-Date -Format "yyyyMMddHHmmss"
$result_file = "C:\work\20210823\result\Intune_Device$date.txt"
$msg1 = "OK"
$msg2 = "NG"
$msg3 = "ファイルの作成に成功しました"
$msg4 = "ファイルの作成に失敗しました"
$msg5 = "ファイルのオープンに失敗しました"
$msg6 = "ファイルのクローズに失敗しました"
$msg7 = "ファイルのクローズに成功しました"

######  コマンド実行メソッド
function command {
    Get-IntuneManagedDevice | Format-List | Out-File $result_file
    return $?
}

######  リターンコード確認メソッド
function return_code($flag) {
    if ($flag -eq "True") {
        Write-Host $msg1
    } else {
        Write-Host $msg2
    }
}
    
#####  出力ファイル確認メソッド
function check_file {
    $flag = Test-Path $result_file
    if ($flag -eq "True") {
        Write-Host $msg3
    } else {
        Write-Host $msg4
        $flag2 = "False"
        critical_end($flag2)
    }
}

######   異常終了メソッド
function critical_end($ans2)  {
    if ($ans2 = "False") {
        Write-Host $msg7
        exit 1
     }
}

$ans1 = command
return_code($ans1)
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
