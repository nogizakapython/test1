﻿###### 条件付きアクセス情報取得スクリプト(ID指定)    　#####
###### Create Date   2021/8/27                         #####
###### Create Author  T.HATTORI                        #####
###Collection APIをusingする。

using namespace System.Collections.Generic

## ArrayListを定義する
$ID = [List[String]]@('fffde662-137e-4c1e-aa94-3c601cc319f0')　

## 日付
$date = Get-date -Format "yyyyMMddHHmmss"


##出力ファイル
$result_file = "C:\work\20210827\result\Get-AzureADMSConditionalAccessPolicy$date.txt"
#行数カウント
$count=0

#出力メッセージ一覧
$msg1="OK"
$msg2="NG"
$msg3="条件付きアクセス情報ファイルが取得が成功しました"
$msg4="条件付きアクセス情報ファイルの取得に失敗しました"
$msg5="異常終了です"
$msg6="例外処理発生。ファイルのOPENに失敗しました"
$msg7="ファイルのOPENに成功しました"
$msg8="例外処理発生。ファイルのCLOSEに失敗しました"
$msg9="ファイルのCLOSEに成功しました"

#リターンコード
$normal_code=0
$error_code=1

## コマンド実行メソッド
function command {
    foreach ($line in $ID){
        Get-AzureADMSConditionalAccessPolicy | Format-List | Out-File $result_file -Append 
        return_code ($?)
    }
}

### リターンコード確認メソッド
function return_code($ans1) {
    if ($ans1 -eq "True") {
        Write-Host $msg1
    } else {
        Write-Host $msg2
    }
}
### ファイルの存在確認チェックメソッド
function check_file {
    $flag = Test-Path $result_file
    if($flag -eq "True") {
        Write-Host $msg3
    } else {
        Write-Host $msg4
        $swc="False"
        critical_error($swc)
    }
}
### 異常終了メソッド
function critical_error($ans1){
    if($ans1 -eq "False") {
        Write-Host $msg5
        exit $error_code
    }
}
### ファイルの読み込みメソッド
function file_read {
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
}
 
####メイン処理#######
command
check_file 
file_read

exit $normal_code