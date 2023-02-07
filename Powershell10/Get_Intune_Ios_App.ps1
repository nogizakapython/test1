#########  Intune Android Application 情報収集スクリプト
#########  Create  Date    2021/8/30
#########  Create  Author  T.HATTORI
#using　APIの定義
using namespace System.Collections.Generic
# ArrayListの定義
$ID_LIST = [List[String]]@('T_d496acf8-100c-47eb-a1bb-118dda23b7d4')

#出力ファイルの定義
$result_file = "C:\work\20210830\result\Intune_IOS_App.txt"

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
    Get-IntuneAppProtectionPolicyIosApp -iosManagedAppProtectionId $line | Format-List | Out-File $result_file -Append
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

                    