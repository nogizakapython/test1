##### 文字列テスト                        ##########
##### Create Date     2021/9/8            ##########
##### Create AUthor   T.HATTORI           ##########
$date = Get-Date -Format "yyyyMMddHHmmss"
$result_file = "C:\work\20210908\result\mojiretsu_test$date.txt"

Write-Host "0から24までの数字を入力してください"
$hour = Read-Host 
if ($hour -lt 10 ) {
    $hour = "0" + $hour
} elseif ($hour -gt 24 ){
    Write-Host "NG"
    exit 1
}

Write-Host "0から59までの数字を入力してください"
$minutes = Read-Host
if ($minutes -lt 10 ) {
    $minutes = "0" + $minutes
} elseif ( $minutes -ge 60 ) {
    Write-host "NG"
    exit 1
}

Write-Host "0から59までの数字を入力してください"
$seconds = Read-Host 
if ($seconds -lt 10 ) {
    $seconds = "0" + $seconds 
} elseif ( $seconds -ge 60 ) {
    Write-host "NG"
    exit 1
}

$ans = $hour + ":" + $minutes + ":" + $seconds
Write-Host $ans

