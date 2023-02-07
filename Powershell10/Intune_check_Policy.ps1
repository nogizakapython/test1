####  Intune  コンプライアンスポリシー　情報取得Powershell
####  Create  Date   2021/8/24
####  Create  Author  T.HATTORI

$result_file = "C:\work\20210824\result\Device_CompliancePolicy.txt"
$msg1 = "OK"
$msg2 = "NG"
$msg3 = "ファイルの取得に成功しました"
$msg4 = "ファイルの取得に失敗しました"
$msg5 = "異常終了です"
$msg6 = "ファイルのOPENに失敗しました"
$msg7 = "ファイルのOPENに成功しました"
$msg8 = "ファイルのCLOSEに失敗しました"
$msg9 = "ファイルのCLOSEに成功しました"


#### コマンド実行メソッド
function command {
    Get-IntuneDeviceCompliancePolicy | Format-List | Out-File $result_file
    return $?
}

#### リターンコードメソッド
function return_code($ans1){
    if ($ans1 -eq "True") {
        Write-Host $msg1
    } else {
        Write-Host $msg2
    }
}

#### ファイルの存在確認メソッド
function file_check {
    $flag = Test-Path $result_file
    if ($flag -eq "True"){
        Write-Host $msg3
    } else { 
        Write-Host $msg4
        $flag = "False"
        critical_check($flag)
    }
}

###  異常終了メソッド
function critical_check($flag) {
     if ($flag -eq "False") {
        Write-Host $msg5
        exit 1
    }
}

$ans1 = command
return_code($ans1)
file_check

#####ファイルを読み込む処理
try
{
    $file = New-Object System.IO.StreamReader($result_file)
} 
catch
{
    Write-Host $msg6
    $ans = "False"
    critical_check($ans)
}

Write-Host $msg7
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
    Write-Host $msg8
    $ans = "False"
    critical_check($ans)
}
Write-Host $msg9
Write-Host "ファイルの行は"$count"です。"
exit 0
