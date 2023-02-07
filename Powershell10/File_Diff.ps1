#######  Get-AzureADUserとGet-MsolUserの比較スクリプト
#######  Create  Date   2021/8/30
#######  Create  Author  T.HATTORI

#using　APIの定義
using namespace System.Collections.Generic

###出力ファイルの変数定義
$result_file1 = "C:\work\20210830\result\Get-AzureADUSER.txt"
$result_file2 = "C:\work\20210830\result\Get-MsolUser.txt"

# ArrayListの定義
$FILE_LIST = [List[String]]@()

#メッセージの定義
$msg1 = "OK"
$msg2 = "NG"
$msg3 = "ファイルの作成に成功しました"
$msg4 = "ファイルの作成に失敗しました"
$msg5 = "ファイルのOPENに失敗しました"
$msg6 = "ファイルのOPENに成功しました"
$msg7 = "ファイルのCLOSEに失敗しました"
$msg8 = "ファイルのCLOSEに成功しました"

#リターンコードの定義
$normal_code = 0
$error_code = 1
#ファイルの行数カウント
$count = 0

##ArrayListに結果ファイルを格納する
function list_add {
    $File_List.add($result_file1)
    $File_List.add($result_file2)
}

function command1 {
    Get-AzureADUser | Out-File $result_file1
    return_code($?)
}

function command2 {
    Get-MsolUser | Out-File $result_file2
    return_code($?)
}

function return_code($ans) {
    if ($ans -eq "True") {
        Write-Host $msg1
    } else {
        Write-Host $msg2
    }
}

function check_file($file_name) {
    if ((test-path $file_name) -eq "True" ) {
        Write-Host $msg3
    } else {
        Write-Host $msg4
        $flag = "False"
        critical_error($flag)
    }
}

function critical_error($ans2) {
    if ($ans2 -eq "True" ) {
        Write-Host $msg9
        exit $error_code
    }
}

function read_file($file_name) {
    try {
        $file = New-Object System.IO.StreamReader($file_name)
    } catch [System.IO.IOException] {
        Write-Host $msg5
        $flag = "False"
        critical_error($flag)
    }
    Write-Host $msg6
    while (($line = $file.ReadLine()) -ne $null) {
        $count += 1
    }

    try {
        $file.Close()
    } catch [System.IO.IOException] {
        Write-Host $msg7
        $flag = "False"
        critical_error($flag)
    }
    Write-Host $msg8
    Write-Host "ファイルの行数は"$count"件です"
}

list_add    
command1
command2
foreach ($line in $FILE_LIST) {
    check_file($line)
}
                     
foreach ($line in $FILE_LIST) {
    read_file($line)
}

exit $normal_code
                                          