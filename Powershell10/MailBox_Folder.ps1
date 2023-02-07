####  Powershell　メールボックスフォルダー情報取得スクリプト  #####
####  Create Date  2021/8/23
####  Create Author T.HATTORI
#出力先ファイル名を定義する。
$result_file = "c:\work\20210823\result\MailBox_Folder.txt"
#行数カウント
$count = 0
#CSVファイルの出力先フォルダーを設定する。
$chara_set = "UTF8"

### コマンドのリターンコード確認処理メソッド
function return_code($ans) {
    if ($ans -eq "True"){
        Write-Host "OK"
    } else {
        Write-Host "NG"
    }
}

### ファイルの存在確認メソッド
function test_path{
    $flag = Test-Path $result_file
    return $flag
}

### コマンド実行メソッド
function mailbox{
    Get-MailBoxFolder | Format-List | Out-File $result_file
    return $?
}

### ファイル作成確認処理のメソッド
function check_file($ans2) {
    $msg1 = "ファイルの作成に成功しました"
    $msg2 = "ファイルの作成に失敗しました"
    if ($ans2 -eq "True") {
        Write-Host $msg1
        return 0
    } else {
        Write-Host $msg2
        return 1
    }
}
#### 異常終了チェック処理メソッド

function critical_check($ans3){
    $msg3 = "異常終了"
    if ($ans3 -eq "False") {
        Write-Host $msg3
        exit 1
    }
}

####メイン処理##########
$ans = mailbox
return_code($ans) 
$flag2 = test_path
$flag3=check_file($flag2)
critical_check($flag3)

#####ファイルを読み込む
try
{
    $file = New-Object System.IO.StreamReader($result_file)
} 
catch
{
    Write-Host "ファイルを開くのに失敗しました"
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
    Write-Host "ファイルを閉じるのに失敗しました"
    $ans = "False"
    critical_check($ans)
}

Write-Host "ファイルが正常に閉じました"
Write-Host "ファイルの行は"$count"です。"
