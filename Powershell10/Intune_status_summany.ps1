#####  Intuneのデバイスの設定サマリーレポートPowershell
#####   Create Date    2021/8/24
#####   Create Author  T.HATTORI

$result_file ="C:\work\20210824\result\Device_Info_summany.txt"
$msg1="OK"
$msg2="NG"
$msg3="ファイルの取得に成功しました"
$msg4="ファイルの取得に失敗しました"

#####コマンド実行メソッド
function command{
    Get-IntuneDeviceConfigurationDeviceStateSummary | Format-List | Out-File $result_file
    return $?
}
####リターンコードメソッド
function return_code($ans1){
    if ($ans1 -eq "True") {
        Write-Host $msg1
    } else {
        Write-Host $msg2
    }
}
####ファイルの存在チェックメソッド
function check_file {
    $flag = Test-Path $result_file
    if ($flag -eq "True") {
        Write-Host $msg3
    } else {
        Write-Host $msg4
    }
}

$return1 = command
return_code($return1)
check_file
