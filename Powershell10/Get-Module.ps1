#####  Powershell Module 確認スクリプト
#####  Create Date   2021/8/30
#####  Create Author T.HATTORI

$result_file ="C:\work\20210830\result\Module_list.txt"
$msg1 = "ファイルのCLOSEに失敗しました"
$msg2 = "例外処理が発生しました"
$msg3 = "ファイルの読み込みの例外処理が発生しました"
$msg4 = "ファイルの読み込みが正常に行われます"
$msg5 = "ファイルのCLOSEが成功しました"
$msg6 = "ファイルが存在しません"
$count = 0
$normal_code = 0
$error_code = 1
$second = 60

#例外終了時にエラー関数を呼び出して異常終了する。
function critical_error($ans1) {
    if ($ans1 -eq "False") {
        Write-Host $msg2
        exit $error_code
    }
}


Get-Module -ListAvailable | Format-List | Out-File $result_file
if ($? -eq "True") {
    Write-Host "OK"
} else { 
    Write-Host "NG"
}

## try-catch文でファイルの存在確認、ファイルの読み込み例外が発生した時、catchブロックに移動するようにする
try{
    $file = New-Object System.IO.StreamReader($result_file)
} catch [System.IO.FileNotFoundException] {
    Write-Host $msg6
    $flag = "False"
    critical_error($flag)     
} catch [System.IO.IOException]{
    Write-Host $msg3
    $flag = "False"
    critical_error($flag)
} 

Write-Host $msg4
while (($line = $file.ReadLine()) -ne $null ) {
     $count +=1
}

##ファイルのCLOSEに失敗したとき、catchブロックに処理が移るようにする。
try {
    $file.close()
} catch [System.IO.IOException]{
    Write-Host $msg1
    $flag = "False"
    critical_error($flag)
}
Write-Host $msg5
Write-Host $count"件です" 
exit $normal_code
