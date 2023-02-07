#######  ユーザーリスト作成スクリプト
#######  Create Date  2021/8/30
#######  Create Author  T.HATTORI

$date = Get-date -Format "yyyyMmddHHmmss"

$input_file = "C:\work\20210830\csv\User_id.csv"
$out_file = "C:\work\20210830\result\User_idList$date.txt"
$count = 0
$normal_code = 0
$error_code = 1
$sum_count=0


function critical_error($ans) {
    Write-Host "異常終了です"
    exit $error_code
}

try {
    $file = New-Object System.IO.StreamReader($input_file)
} catch [IO.System.Exception] {
    Write-Host "例外処理が発生しました"
    critical_error("False")
 }

while (($line = $file.ReadLine()) -ne $null ) {
    if ($line -eq "#TYPE Selected.Microsoft.Open.AzureAD.Model.User") {
        Write-Host "データ外"
    } elseif ($sum_count -eq 1) {
        Write-Host "データ外"
    } else {
        Write-Output $line | Out-File  $out_file -Append
        $count += 1
    }
    $sum_count += 1
}

Write-Host "データは"$count"件です"
exit $normal_code
