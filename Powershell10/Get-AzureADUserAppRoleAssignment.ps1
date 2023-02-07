##### Azureアプリケーションロールのアサイン状況確認 #####
##### Create  Date       2021/9/9                   #####
##### Create  Author     T.HATTORI                  #####
#########################################################

#using　APIの定義
using namespace System.Collections.Generic
# ArrayListの定義
$ID_LIST = [List[String]]@('252bd9d2-80e3-47d5-9e09-fadac19f1d0d','7d3c4cd6-674b-4ef5-b8d5-9ff778d248c5','8f8d6449-7ce2-4db5-9438-c2270fa7cfb7')

#出力ファイルの定義
$result_file = "C:\work\20210909\result\Get-AzureADUserAppRoleAssignment.txt"

#メッセージの定義
$msg1 = "OK"
$msg2 = "NG"
$msg3 = "データファイルの作成に成功しました"
$msg4 = "データファイルの作成に失敗しました"
$msg5 = "異常終了でスクリプトを終了します"
$msg6 = "ファイルのOPENに失敗しました"
$msg7 = "ファイルのOPENに成功しました"
$msg8 = "ファイルのCLOSEに失敗しました"
$msg9 = "ファイルのCLOSEに成功しました"

#リターンコードの定義
$normal_code = 0
$error_code = 1

function command($line) {
    Get-AzureADUserAppRoleAssignment -ObjectId $line | Format-List | Out-File $result_file -Append
    return_code($?)
}

function return_code($ans) {
    if ($ans -eq "True") {
        Write-Host $msg1
    } else {
        Write-Host $msg2
    }
}

function critical_error($ans2){
    if ($ans2 -eq "False") {
        Write-Host $msg5
        exit $error_code
    }
}

function read_file {
    ## try-catch文でファイルの存在確認、ファイルの読み込み例外が発生した時、catchブロックに移動するようにする
    try{
        $file = New-Object System.IO.StreamReader($result_file)
    } catch [System.IO.FileNotFoundException] {
        Write-Host $msg4
        $flag = "False"
        critical_error($flag)
    } catch [System.IO.IOException]{
        Write-Host $msg6
        $flag = "False"
        critical_error($flag)
    } 

    Write-Host $msg7
    while (($line = $file.ReadLine()) -ne $null ) {
        $count +=1
    }

    ##ファイルのCLOSEに失敗したとき、catchブロックに処理が移るようにする。
    try {
        $file.close()
    } catch [System.IO.IOException]{
        Write-Host $msg8
        $flag = "False"
        critical_error($flag)
    }
    Write-Host $msg9
    Write-Host $count"件です"
}

foreach ($id in $ID_LIST) {
    command($id)
}

read_file
exit $normal_code

                    