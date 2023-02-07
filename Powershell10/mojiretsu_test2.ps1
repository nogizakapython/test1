##### 文字列テスト                        ##########
##### Create Date     2021/9/8            ##########
##### Create AUthor   T.HATTORI           ##########
$date = Get-Date -Format "yyyyMMddHHmmss"
$result_file = "C:\work\20210908\result\mojiretsu_test$date.txt"
$count = 0
$const_count = 9
while ($true) {
    $count = 0
    $const_count=0
    Write-Host "0から24までの数字を入力してください"
    $hour = Read-Host
    $hour2 = $hour
    if (($hour -ge 0 ) -and ($hour -lt 10)) {
        $hour = "0" + $hour
        $count += 1
    } elseif ($hour -lt 24 ){
        $count += 1
    } else {
        Write-Host "NG"
    }
        
    Write-Host "0から59までの数字を入力してください"
    $minutes = Read-Host
    $minutes2 = $minutes
    if (($minutes -ge 0 ) -and ($minutes -lt 10)) {
        $minutes = "0" + $minutes
        $count += 1
    } elseif ( $minutes -lt 60 ) {
        $count += 1
    } else {
        Write-host "NG"
    }

    Write-Host "0から59までの数字を入力してください"
    $seconds = Read-Host 
    if (($seconds -ge 0 ) -and ($seconds -lt 10)) {
        $seconds = "0" + $seconds
        $count += 1 
    } elseif ( $seconds -lt 60 ) {
        $count += 1
    } else {
        Write-host "NG"
    }
    if (($hour2 -eq 0) -and ($minutes2 -lt 30 )){
        $const_count += 1
    }
    if (($count -eq 3) -and ($const_count -eq 0)){
        $ans = $hour + ":" + $minutes + ":" + $seconds
        Write-Host $ans
        break
    }
}
